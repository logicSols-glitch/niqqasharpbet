<?php
session_start();
include 'php/config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ./login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passkey = $_POST['passkey'];
    $username = $_SESSION['username'];

    // Hash the passkey for security
    $hashed_passkey = password_hash($passkey, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET passkey = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_passkey, $username);
    $stmt->execute();
    $stmt->close();

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Passkey</title>
</head>
<body>
    <form method="post">
        <label for="passkey">Create a Passkey:</label>
        <input type="password" name="passkey" id="passkey" required>
        <button type="submit">Create Passkey</button>
    </form>
</body>
</html>
