<?php
session_start();
include 'php/config.php';

// Get all bets that involve the updated match
$matchId = $_POST['match_id'];

// Retrieve match results from the database
$stmt = $conn->prepare("SELECT home_score, away_score FROM matches WHERE match_id = ?");
$stmt->bind_param("i", $matchId);
$stmt->execute();
$result = $stmt->get_result();
$match = $result->fetch_assoc();

// Check all bets related to the match and update their status
$betStmt = $conn->prepare("SELECT * FROM bet_history WHERE JSON_CONTAINS(bet_details, JSON_OBJECT('match_id', ?))");
$betStmt->bind_param("i", $matchId);
$betStmt->execute();
$bets = $betStmt->get_result();

while ($bet = $bets->fetch_assoc()) {
    // Evaluate the bet
    $betDetails = json_decode($bet['bet_details'], true);
    $betStatus = 'lost'; // default to lost

    // Assuming the bet is on a specific outcome (win/draw/lose), check conditions
    foreach ($betDetails as $detail) {
        if ($detail['match_id'] == $matchId) {
            if (($match['home_score'] > $match['away_score'] && $detail['prediction'] === 'home_win') ||
                ($match['home_score'] < $match['away_score'] && $detail['prediction'] === 'away_win') ||
                ($match['home_score'] === $match['away_score'] && $detail['prediction'] === 'draw')) {
                $betStatus = 'won';
            }
        }
    }

    // Update bet status in the database
    $updateStmt = $conn->prepare("UPDATE bet_history SET status = ? WHERE bet_id = ?");
    $updateStmt->bind_param("si", $betStatus, $bet['bet_id']);
    $updateStmt->execute();
}
?>
