<?php
session_start();
include 'php/config.php';
header('Content-Type: application/json');

try {
    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        throw new Exception('User not logged in.');
    }

    $username = $_SESSION['username'];

    // Prepare SQL statement to fetch settled bets for the logged-in user
    $stmt = $conn->prepare("SELECT * FROM settled_bets WHERE username = ?");
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $settledBets = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($settledBets);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
