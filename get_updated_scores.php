<?php
session_start();
// get_updated_scores.php
include 'php/config.php';

$match_id = $_GET['match_id'];

$stmt = $conn->prepare("SELECT home_score, away_score FROM matches WHERE id = ?");
$stmt->bind_param("i", $match_id);
$stmt->execute();
$stmt->bind_result($home_score, $away_score);
$stmt->fetch();

echo json_encode(["home_score" => $home_score, "away_score" => $away_score]);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function fetchUpdatedScores(matchId) {
    fetch(`get_updated_scores.php?match_id=${matchId}`)
    .then(response => response.json())
    .then(data => {
        document.getElementById(`home_score_${matchId}`).innerText = data.home_score;
        document.getElementById(`away_score_${matchId}`).innerText = data.away_score;
    })
    .catch(error => console.error('Error:', error));
}

// Call this function periodically to update scores
setInterval(() => {
    fetchUpdatedScores(1); // Replace with the actual match ID
}, 30000); // Update every 30 seconds

    </script>
</body>
</html>
