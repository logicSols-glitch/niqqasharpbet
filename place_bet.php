<?php
session_start();
include 'php/config.php';

header('Content-Type: application/json');

try {
    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        throw new Exception('User not logged in.');
    }

    // Retrieve username from the session
    $username = $_SESSION['username'];

    // Retrieve POST data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $betAmount = $data['amount'];

    // Start MySQL transaction
    $conn->begin_transaction();

    // Fetch the user's balance from the database
    $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        throw new Exception('User not found.');
    }

    $userBalance = $user['balance'];

    // Check if the user has sufficient funds
    if ($userBalance < $betAmount) {
        throw new Exception('Insufficient balance.');
    }

    // Deduct the bet amount from the user's balance
    $newBalance = $userBalance - $betAmount;
    $stmt = $conn->prepare("UPDATE users SET balance = ? WHERE username = ?");
    $stmt->bind_param("ds", $newBalance, $username);
    if (!$stmt->execute()) {
        throw new Exception('Failed to update balance: ' . $stmt->error);
    }

    // Insert bet details into bet_history table
    $betDetailsJson = json_encode($data['betDetails']);
    $stmt = $conn->prepare("INSERT INTO bet_history (username, bet_code, total_odds, amount, potential_return, bet_details) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }

    $stmt->bind_param("ssddds", $username, $data['betCode'], $data['totalOdds'], $betAmount, $data['potentialReturn'], $betDetailsJson);
    if (!$stmt->execute()) {
        throw new Exception('Failed to execute statement: ' . $stmt->error);
    }

    // Commit the transaction
    $conn->commit();

    // Update the session balance
    $_SESSION['balance'] = $newBalance;

    // Return success response
    echo json_encode(['success' => true, 'new_balance' => $newBalance]);

} catch (Exception $e) {
    // Rollback the transaction in case of error
    $conn->rollback();
    echo json_encode(['error' => $e->getMessage()]);
}
?>
