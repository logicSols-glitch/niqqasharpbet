<?php
session_start();
include 'php/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userEmail = $_POST['email'];

    // Check if the email is registered
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        die("Email not registered. Please use your registered email.");
    } else {
        // Proceed with initiating the payment
        $stmt->bind_result($userId);
        $stmt->fetch();

        // Save user ID and email in session or proceed with payment initiation
        $_SESSION['user_id'] = $userId;
        $_SESSION['email'] = $userEmail;

                // Code to initiate payment...
                $email = $_SESSION['email']; // Email from the user's session
        $userId = $_SESSION['user_id'];
        $metadata = json_encode([
            'user_id' => $userId,
            'email' => $email
        ]);

        // Other Paystack payment initialization code here...

        $data = array(
            "email" => $email,
            "amount" => $amount * 100, // Paystack uses kobo, so multiply by 100
            "metadata" => $metadata,
            // Other required parameters
        );

    }
}
