<?php
// fetch_live_matches.php
require_once 'php/config.php'; // DB connection file

$sql = "SELECT match_id, home_team, away_team FROM matches WHERE match_status = 'live'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $live_matches = [];
    while ($row = $result->fetch_assoc()) {
        $live_matches[] = $row;
    }
    echo json_encode(['success' => true, 'matches' => $live_matches]);
} else {
    echo json_encode(['success' => false, 'message' => 'No live matches found']);
}

$conn->close();
?>
