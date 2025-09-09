<?php
session_start();
require_once 'db_connect.php'; // your DB connection (must define $pdo)

// simple auth guard
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user's bets with aggregated info
$sql = "
  SELECT b.id AS bet_id,
         b.bet_code,
         b.amount,
         b.total_odds,
         b.cashout_amount,
         b.status AS overall_status,
         b.bet_details, -- assumed JSON string of individual legs
         b.placed_time
  FROM bets b
  WHERE b.user_id = ?
  ORDER BY b.placed_time DESC
";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$bets = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = [];

foreach ($bets as $bet) {
    $overall_status = $bet['overall_status']; // e.g., pending, won, lost
    $bet_details = json_decode($bet['bet_details'], true);
    $all_finished = true;
    $any_lost = false;
    $any_won = false;

    // Enrich each leg with live match data and determine sub-status
    foreach ($bet_details as &$detail) {
        // Expect detail to have match_id, selection (home/away/draw), odds etc.
        $matchStmt = $pdo->prepare("SELECT home_team, away_team, home_score, away_score, status AS match_status, start_time FROM matches WHERE id = ?");
        $matchStmt->execute([$detail['match_id']]);
        $match = $matchStmt->fetch(PDO::FETCH_ASSOC);

        if (!$match) {
            $detail['live_status'] = 'unknown';
            $all_finished = false;
            continue;
        }

        $detail['home_team'] = $match['home_team'];
        $detail['away_team'] = $match['away_team'];
        $detail['home_score'] = $match['home_score'];
        $detail['away_score'] = $match['away_score'];
        $detail['match_status'] = $match['match_status'];

        // Determine leg outcome if finished
        $leg_result = 'pending'; // default
        if ($match['match_status'] === 'finished') {
            $home = (int)$match['home_score'];
            $away = (int)$match['away_score'];
            $selection = strtolower($detail['selection'] ?? '');

            if ($selection === 'home' && $home > $away) {
                $leg_result = 'won';
            } elseif ($selection === 'away' && $away > $home) {
                $leg_result = 'won';
            } elseif ($selection === 'draw' && $home === $away) {
                $leg_result = 'won';
            } else {
                $leg_result = 'lost';
            }
        } elseif ($match['match_status'] === 'live') {
            $all_finished = false;
        } else { // scheduled or other
            $all_finished = false;
        }

        $detail['leg_status'] = $leg_result;

        if ($leg_result === 'lost') {
            $any_lost = true;
        } elseif ($leg_result === 'won') {
            $any_won = true;
        } else {
            // still pending
        }
    }
    unset($detail); // break reference

    // Derive overall bet status: if any leg lost => lost; if all finished and none lost => won; else pending
    $derived_status = $overall_status;
    if ($any_lost) {
        $derived_status = 'lost';
    } elseif ($all_finished && !$any_lost) {
        $derived_status = 'won';
    } else {
        $derived_status = 'pending';
    }

    // Persist if changed
    if ($derived_status !== $overall_status) {
        $upd = $pdo->prepare("UPDATE bets SET status = ? WHERE id = ?");
        $upd->execute([$derived_status, $bet['bet_id']]);
    }

    // Potential payout (simple parlay calculation)
    $potential_payout = $bet['amount'] * floatval($bet['total_odds']);

    $response[] = [
        'bet_code' => $bet['bet_code'],
        'amount' => number_format($bet['amount'], 2),
        'total_odds' => $bet['total_odds'],
        'cashout_amount' => $bet['cashout_amount'],
        'bet_status' => $derived_status,
        'potential_payout' => number_format($potential_payout, 2),
        'bet_details' => $bet_details,
        'placed_time' => $bet['placed_time'],
    ];
}

header('Content-Type: application/json');
echo json_encode(['bets' => $response]);
