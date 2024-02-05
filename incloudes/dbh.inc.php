<?php

$dsn = "mysql:host=localhost;dbname=graduation_project_db";
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'connection faild: ' . $e->getMessage();
}
