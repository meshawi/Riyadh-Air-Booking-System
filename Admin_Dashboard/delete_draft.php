<?php
include '../incloudes/dbh.inc.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $draftId = $_POST['id'] ?? '';

    if (!empty($draftId) && is_numeric($draftId)) {
        try {
            $sql = "DELETE FROM drafts WHERE draftId = :draftId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':draftId', $draftId, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: index.php"); // Redirect after deletion
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid draft ID.";
    }
}
?>
