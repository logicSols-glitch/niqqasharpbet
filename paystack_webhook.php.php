<?php
include 'php/config.php';


$input = @file_get_contents("php://input");
$event = json_decode($input, true);

if ($event['event'] == 'charge.success') {
    $metadata = $event['data']['metadata'];
    $email = $metadata['email'];
    $userId = $metadata['user_id'];

    // Ensure email matches the registered user's email
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id = ?");
    $stmt->bind_param("si", $email, $userId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // Email and user ID match, update the balance
        $amountPaid = $event['data']['amount'] / 100; // Amount in NGN (Paystack uses kobo)
        $stmt = $conn->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        $stmt->bind_param("di", $amountPaid, $userId);
        $stmt->execute();
    } else {
        // Log the error or take action for unmatched emails
        error_log("Unmatched email for Paystack transaction: " . $email);
    }
}
http_response_code(200); // Acknowledge the webhook was received successfully
?>
