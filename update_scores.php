<?php
// update_scores.php

require_once 'php/config.php'; // Ensure this contains the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $match_id = $_POST['match_id'];
    $home_score = isset($_POST['home_score']) ? $_POST['home_score'] : null;
    $away_score = isset($_POST['away_score']) ? $_POST['away_score'] : null;
    $match_status = $_POST['match_status'];
    $match_time = $_POST['match_time']; // New field for match time
    $match_start_time = $_POST['match_start_time']; // New field for match start time
    $league = $_POST['league']; // New field for league

    // Check if all necessary fields are provided
    if (!empty($match_id) && 
        $home_score !== null && 
        $away_score !== null && 
        !empty($match_status) && 
        !empty($match_time) && 
        !empty($match_start_time) && 
        !empty($league)) {

        // Update the scores, status, time, start time, and league in the database
        $stmt = $conn->prepare("
            UPDATE matches 
            SET home_score = ?, 
                away_score = ?, 
                match_status = ?, 
                match_time = ?, 
                match_start_time = ?, 
                league = ? 
            WHERE match_id = ?
        ");
        $stmt->bind_param("iissssi", $home_score, $away_score, $match_status, $match_time, $match_start_time, $league, $match_id);

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
