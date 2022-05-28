

<?php
$to = 'enzogallos91@gmail.com';
$subject = 'test email';
$message = 'hello';
$headers = 'From: steamallguys@gmail.com' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/html; charset=utf-8';
if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent';
} else {
    echo 'Email sending failed';
}
?>
									