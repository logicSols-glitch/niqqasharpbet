<?php
session_start();
include 'php/config.php';

try {
    // Query to move bets with outcome set to "win" or "lose"
    $stmt = $conn->prepare("INSERT INTO settled_bets (bet_code, total_odds, amount, actual_return, settled_at, bet_details, outcome)
        SELECT bet_code, total_odds, amount, (amount * total_odds) as actual_return, settled_at, bet_details, outcome
        FROM bet_history WHERE outcome IN ('win', 'lose')");

    if ($stmt->execute()) {
        // Optionally delete bets from bet_history that are now in settled_bets
        $deleteStmt = $conn->prepare("DELETE FROM bet_history WHERE outcome IN ('win', 'lose')");
        $deleteStmt->execute();

        echo 'Bets moved to settled_bets table successfully.';
    } else {
        throw new Exception('Failed to move bets to settled_bets.');
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
