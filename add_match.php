<?php
// add_match.php

require_once 'php/config.php'; // Assuming you have a db config file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $home_team = $_POST['home_team'];
    $away_team = $_POST['away_team'];
    $match_status = $_POST['match_status'];

    if (!empty($home_team) && !empty($away_team) && !empty($match_status)) {
        // Insert into the matches table
        $stmt = $conn->prepare("INSERT INTO matches (home_team, away_team, home_score, away_score, match_status) VALUES (?, ?, 0, 0, ?)");
        $stmt->bind_param("sss", $home_team, $away_team, $match_status);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Match added successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add match.']);
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
