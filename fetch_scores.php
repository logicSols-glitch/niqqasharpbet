<?php
include 'php/config.php';

// Fetch match details (home_score, away_score, match_status, match_time, match_start_time)
// Assuming you're fetching match data from the database
$sql = "SELECT match_id, home_team, away_team, home_score, away_score, match_status, match_time, match_start_time FROM matches";
$result = $conn->query($sql);

$matches = [];
while ($row = $result->fetch_assoc()) {
    $matches[] = [
        'match_id' => $row['match_id'],
        'home_team' => $row['home_team'],
        'away_team' => $row['away_team'],
        'home_score' => $row['home_score'],
        'away_score' => $row['away_score'],
        'match_status' => $row['match_status'],
        'match_time' => $row['match_time'], // optional for first half or second half
        'match_start_time' => $row['match_start_time'] // when the match went live
    ];
}

echo json_encode($matches);


$conn->close();
?>
