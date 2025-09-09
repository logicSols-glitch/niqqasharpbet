<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email_or_phone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    // Generate a unique account number (e.g., a random 10-digit number)
    $accountNumber = strtoupper(uniqid('ACC'));

    // Check if the account number already exists (unlikely with uniqid but good practice)
    $sql = "SELECT account_number FROM users WHERE account_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $accountNumber);
    $stmt->execute();
    $stmt->store_result();

    // If the account number exists, regenerate it (loop until a unique one is found)
    while ($stmt->num_rows > 0) {
        $accountNumber = strtoupper(uniqid('ACC'));
        $stmt->bind_param("s", $accountNumber);
        $stmt->execute();
        $stmt->store_result();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user with the generated account number
    $sql = "INSERT INTO users (username, email_or_phone, password, account_number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email_or_phone, $hashedPassword, $accountNumber);

    if ($stmt->execute()) {
        echo "Registration successful! Your account number is: " . $accountNumber;
        // Redirect to the login page or another page
        // header("Location: login.php");
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
}
?>
