<?php
session_start();
include 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $pdo->prepare("INSERT INTO contact_submissions (subject, email, message) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $subject);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $message);

    // Execute and check success
    if ($stmt->execute()) {
        echo "Message sent successfully. We will get back to you soon.";
        header('Location: ../index.php'); // Redirect to a success page
    } else {
        echo "There was an error submitting your message. Please try again later.";
    }
}
?>