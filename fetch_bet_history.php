<?php
session_start();
include 'php/config.php'; // Your database connection

$userId = $_SESSION['user_id'];

$betHistory = getBetHistory($userId);

echo json_encode($betHistory);
?>
