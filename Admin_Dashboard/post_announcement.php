<?php
session_start();
include '../incloudes/dbh.inc.php'; 


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nationalId = $_SESSION['user_id']; // Retrieve the National ID from the session
    $content = $_POST['content'] ?? ''; // Retrieve the content from the POST data

    try {
        $sql = "INSERT INTO announcements (national_id, content) VALUES (:national_id, :content)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':national_id', $nationalId);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        // Redirect to a confirmation page or back to the dashboard
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Handle the error
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to the form page if the request method is not POST
    header("Location: index.php");
    exit();
}
?>