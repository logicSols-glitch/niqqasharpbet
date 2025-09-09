<?php
session_start();
include 'php/config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ./login.html");
    exit();
}

$username = $_SESSION['username'];
$withdrawal_amount = $_GET['amount'];

// Fetch user bank details (ensure you have these stored in your database)
$sql = "SELECT bank_code, account_number FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($bank_code, $account_number);
$stmt->fetch();
$stmt->close();

$paystack_secret_key = 'sk_test_9c292540cf7d1f8db3a646892347bf615bb001df'; // Replace with your test secret key

// Prepare the transfer request
$transfer_data = [
    'source' => 'balance',
    'reason' => 'Withdrawal from NiqqasharpBet',
    'amount' => $withdrawal_amount * 100, // Paystack expects amount in kobo
    'recipient' => [
        'type' => 'nuban',
        'name' => $username,
        'account_number' => $account_number,
        'bank_code' => $bank_code,
        'currency' => 'NGN'
    ]
];

// Initiate cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paystack.co/transfer");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($transfer_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer sk_test_9c292540cf7d1f8db3a646892347bf615bb001df",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$response_data = json_decode($response, true);

if ($response_data['status']) {
    echo "Withdrawal successful!";
    header("Location: profile.php");
} else {
    echo "Withdrawal failed: " . $response_data['message'];
    // Optionally, you can revert the user's balance here if needed
}
?>
