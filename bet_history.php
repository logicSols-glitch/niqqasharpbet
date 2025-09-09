<?php
include 'php/config.php';

// Fetch bet history
$sql = "SELECT b.bet_code, b.total_odds, b.amount, b.bet_details, m.home_score, m.away_score, m.match_time 
        FROM bet_history b 
        LEFT JOIN matches m ON JSON_UNQUOTE(JSON_EXTRACT(b.bet_details, '$.match_id')) = m.match_id";

$result = $conn->query($sql);

$bets = [];
while ($row = $result->fetch_assoc()) {
    $bets[] = [
        'bet_code' => $row['bet_code'],
        'total_odds' => $row['total_odds'],
        'amount' => $row['amount'],
        'bet_details' => json_decode($row['bet_details'], true),
        'home_score' => $row['home_score'] ?? '-',
        'away_score' => $row['away_score'] ?? '-',
        'match_time' => $row['match_time'] ?? 'TBD',
    ];
}

echo json_encode($bets);
$conn->close();
?>
