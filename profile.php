<style>
.sty{
    color: red;
    float: right
}
.stylepay{
    display: flex;
    justify-content: space-between;
}
</style>
<?php
session_start();
include 'php/config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ./login.html");
    exit();
}

// Fetch user details from the database
$username = $_SESSION['username'];
$sql = "SELECT  balance, account_number FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result( $balance, $account_number);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bet.css">
    <title>User Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?> <span class="sty"><i class="fa fa-bars">settings</i></span> </h1>
    <!-- <p>Email: <?php echo htmlspecialchars($email); ?></p> -->
    <p>Account Number: <?php echo htmlspecialchars($account_number); ?></p>
    <p>Balance: $<?php echo htmlspecialchars($balance); ?></p>
    <div class="stylepay">
        <a href="./pay.html">Deposit</a>
        <a href="./withdrawal.php">Withdraw</a>
    </div>
    <!-- Add more profile details here -->
    <a href="./logout.php">Log Out</a>
</body>
</html>
