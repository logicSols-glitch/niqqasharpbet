<?php
session_start();
session_unset();
session_destroy();
header("Location: /BET/index.php");
exit();
?>
