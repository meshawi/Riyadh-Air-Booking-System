<?php
include '../incloudes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $thought = $_POST['thought'] ?? '';

    // Sanitize input
    $title = htmlspecialchars($title);
    $thought = htmlspecialchars($thought);

    try {
        // Prepare SQL and bind parameters
        $stmt = $pdo->prepare("INSERT INTO drafts (title, thought) VALUES (:title, :thought)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':thought', $thought);

        $stmt->execute();

        echo "Draft saved successfully!";
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



