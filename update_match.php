<?php
// update_match.php

include 'php/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $match_id = $_POST['match_id'];
    $home_score = $_POST['home_score'] ?? 0;
    $away_score = $_POST['away_score'] ?? 0;
    $match_status = $_POST['match_status'];
    $match_time = $_POST['match_time'] ?? '00:00';

    if (!empty($match_id)) {
        $stmt = $conn->prepare("UPDATE matches SET home_score = ?, away_score = ?, match_status = ?, match_time = ? WHERE match_id = ?");
        $stmt->bind_param("iissi", $home_score, $away_score, $match_status, $match_time, $match_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Match updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update match']);
        }
        $stmt->close();
    }
}
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
<form id="updateMatchForm">
    <input type="hidden" name="match_id" value="1"> <!-- Match ID should be dynamic -->
    <label for="home_score">Home Score:</label>
    <input type="number" id="home_score" name="home_score" required>
    <label for="away_score">Away Score:</label>
    <input type="number" id="away_score" name="away_score" required>
    <button type="submit">Update Match</button>
</form>

<script>
document.getElementById('updateMatchForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch('update_match.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>


<?php
// update_scores.php

require_once 'php/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $match_id = $_POST['match_id'];
    $home_score = isset($_POST['home_score']) ? $_POST['home_score'] : null;
    $away_score = isset($_POST['away_score']) ? $_POST['away_score'] : null;
    $match_status = $_POST['match_status'];
    $match_time = $_POST['match_time']; // New field for match time

    // Check if all necessary fields are provided
    if (!empty($match_id) && $home_score !== null && $away_score !== null && !empty($match_status) && !empty($match_time)) {
        // Update the scores, status, and time in the database
        $stmt = $conn->prepare("UPDATE matches SET home_score = ?, away_score = ?, match_status = ?, match_time = ? WHERE match_id = ?");
        $stmt->bind_param("iissi", $home_score, $away_score, $match_status, $match_time, $match_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Match details updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update match details.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

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

    <form id="add-match-form" action="add_match.php" method="POST">
        <label for="home_team">Home Team:</label>
        <input type="text" name="home_team" id="home_team" required>
        
        <label for="away_team">Away Team:</label>
        <input type="text" name="away_team" id="away_team" required>
        
        <label for="match_status">Match Status:</label>
        <select name="match_status" id="match_status" required>
            <option value="upcoming">Upcoming</option>
            <option value="live">Live</option>
            <option value="finished">Finished</option>
        </select>
        
        <button type="submit">Add Match</button>
    </form>
    
    <form method="POST" action="update_scores.php">
        <input type="text" name="match_id" placeholder="Match ID" required>
        <input type="number" name="home_score" placeholder="Home Score" required>
        <input type="number" name="away_score" placeholder="Away Score" required>
        <input type="text" name="match_status" placeholder="Match Status" required>
        <input type="time" name="match_time" placeholder="Match Time" required> <!-- Time input -->
        <button type="submit">Update Match</button>
    </form>
    
    
</body>
</html>