<?php
$path = __DIR__ . '/vendor/phpmailer/phpmailer';

if (is_dir($path)) {
    echo 'PHPMailer directory exists.';
} else {
    echo 'PHPMailer directory does not exist.';
}
?>
