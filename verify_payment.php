<!-- <?php
// session_start();
// include 'php/config.php';

// if (!isset($_SESSION['username'])) {
//     header("Location: ./login.html");
//     exit();
// }

// $reference = $_GET['reference'];
// $email_or_phone = $_SESSION['email_or_phone'];

// Verify the payment with Paystack
// $curl = curl_init();
// curl_setopt_array($curl, array(
//     CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_HTTPHEADER => array(
//         "Authorization: Bearer sk_test_9c292540cf7d1f8db3a646892347bf615bb001df",
//         "Content-Type: application/json"
//     ),
// ));

// $response = curl_exec($curl);
// $transaction = json_decode($response);

// if (!$transaction->status) {
//     die("Payment verification failed. 'Status' key is missing or false.");
// }

// // Check if payment is successful
// if ($transaction->data->status == 'success') {
//     // Update user balance in the database
//     $amount = $transaction->data->amount / 100; // Convert to naira
//     $sql = "UPDATE users SET balance = balance + ? WHERE email_or_phone = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ds", $amount, $email_or_phone);
//     $stmt->execute();
//     $stmt->close();

//     // Redirect to the profile page with a success message
//     $_SESSION['balance'] += $amount;
//     header("Location: profile.php?message=Payment successful! Your new balance is: ₦" . $_SESSION['balance']);
//     exit();
// } else {
//     die("Payment verification failed.");
// }
// ?> 


<?php
session_start();
include 'php/config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ./login.html");
    exit();
}

$reference = $_GET['reference'];
$email_or_phone = $_SESSION['email_or_phone'];

// Verify the payment with Paystack
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_9c292540cf7d1f8db3a646892347bf615bb001df",
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);
$transaction = json_decode($response);

if (!$transaction->status) {
    die("Payment verification failed. 'Status' key is missing or false.");
}

// Check if payment is successful
if ($transaction->data->status == 'success') {
    // Update user balance in the database
    $amount = $transaction->data->amount / 100; // Convert to naira
    $sql = "UPDATE users SET balance = balance + ? WHERE email_or_phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $amount, $email_or_phone);
    $stmt->execute();
    $stmt->close();

    // Redirect to the profile page with a success message
    $_SESSION['balance'] += $amount;
    header("Location: profile.php?message=Payment successful! Your new balance is: ₦" . $_SESSION['balance']);
    exit();
} else {
    die("Payment verification failed.");
}
?>
