<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nID = $_POST['nID'];
    $username = $_POST['username'];
    $psw = $_POST['psw'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pNumber = $_POST['pNumber'];
    $DoP = $_POST['DoP'];

    try {

        require_once 'dbh.inc.php';

        $hashedPsw = password_hash($psw, PASSWORD_BCRYPT);

        $query = "INSERT INTO users 
        (National_ID, Username, pwd, First_Name, Last_Name, Email, Phone_number, Date_of_Birth)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$nID, $username, $hashedPsw, $fName, $lName, $email, $pNumber, $DoP]);

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        die();

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}
?>
