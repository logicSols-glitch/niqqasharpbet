<?php
session_start();
include 'php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newBalance = $_POST['balance'];
    $username = $_SESSION['username'];

    // Update the user's balance in the database
    $sql = "UPDATE users SET balance = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $newBalance, $username);
    $stmt->execute();
    $stmt->close();

    // Update the balance in the session
    $_SESSION['balance'] = $newBalance;

    echo json_encode(['success' => true]);
}
?>
