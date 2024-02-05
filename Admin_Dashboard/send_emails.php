<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../incloudes/PHPMailer/src/Exception.php';
require '../incloudes/PHPMailer/src/PHPMailer.php';
require '../incloudes/PHPMailer/src/SMTP.php';

// Replace with your Gmail address and application-specific password
$smtpUsername = 'gpmaleshawi@gmail.com';
$smtpPassword = 'etfqgstsmqzbeirw';

// Replace with your database connection code
try {
    require_once('../incloudes/dbh.inc.php'); // Include your database connection file

    // Fetch emails from the database
    $stmt = $pdo->query("SELECT email FROM subscribers");

    $subject = "Test Email";
    $message = "This is a test email.";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $email = $row['email'];
        sendEmail($smtpUsername, $smtpPassword, $email, $subject, $message);
    }

    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    echo 'Error fetching emails from the database: ' . $e->getMessage();
}

// Function to send email using PHPMailer
function sendEmail($smtpUsername, $smtpPassword, $to, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsername;
        $mail->Password   = $smtpPassword;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($smtpUsername, 'Mohammed Aleshawi');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent to $to. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
