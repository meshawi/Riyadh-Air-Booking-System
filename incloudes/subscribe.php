<?php
        require_once('dbh.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // Get the email from the form submission
        $email = $_POST['Email'];

        // Insert the email into the 'subscribers' table
        $stmt = $pdo->prepare("INSERT INTO subscribers (email) VALUES (:email)");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        header("Location: ../index.php");
        exit();
        } catch (PDOException $e) {
        echo 'Error inserting email into the database: ' . $e->getMessage();
    }
} else {
    // If not a POST request, show an error message
    echo 'Invalid request';
}
?>
