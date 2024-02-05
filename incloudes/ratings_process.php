<?php
session_start();
include 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['opinion'];

    // Prepare and bind
    $stmt = $pdo->prepare("INSERT INTO ratings (user_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $userID);
    $stmt->bindParam(2, $rating);
    $stmt->bindParam(3, $comment);

    // Execute and check success
    if ($stmt->execute()) {
        header('Location: ../Account_Details_Page/account_details.php'); // Redirect to a success page
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }
}
?>