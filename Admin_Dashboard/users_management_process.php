<?php
include '../incloudes/dbh.inc.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../Login_Page/login.php");
    exit();
}


// Handle user fetch, update, and delete requests
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fetch_user'])) {
    $nationalId = $_POST['national_id'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE National_ID = ?");
    $stmt->execute([$nationalId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['userToEdit'] = $user;
    } else {
        // Clear the session variable if no user is found
        unset($_SESSION['userToEdit']);
        $_SESSION['message'] = "No user found with the given National ID.";
    }

    header("Location: users_management.php");
    exit();
}


// Update User
if (isset($_POST['update_user'])) {
    $nationalId = $_POST['national_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $firstName = $_POST['First_Name'];
    $lastName = $_POST['Last_Name'];
    $phoneNumber = $_POST['Phone_number'];
    $dateOfBirth = $_POST['Date_of_Birth'];
    $userRole = $_POST['user_role'];

    $updateStmt = $pdo->prepare("UPDATE users SET 
        Username = ?,
        Email = ?,
        pwd = ?,  
        First_Name = ?,
        Last_Name = ?,
        Phone_number = ?,
        Date_of_Birth = ?,
        user_role = ?
        WHERE National_ID = ?");

    $updateStmt->execute([$username, $email, $pwd, $firstName, $lastName, $phoneNumber, $dateOfBirth, $userRole, $nationalId]);
    $_SESSION['message'] = "User updated successfully.";

    header("Location: users_management.php");
    exit();
}


// Delete User
if (isset($_POST['delete_user'])) {
    $nationalId = $_POST['national_id'];
    $deleteStmt = $pdo->prepare("DELETE FROM users WHERE National_ID = ?");
    $deleteStmt->execute([$nationalId]);
    $_SESSION['message'] = "User deleted successfully.";
    unset($_SESSION['userToEdit']); // Remove the user from session after deletion

    header("Location: users_management.php");
    exit();
}

// Handle Add New User request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    // Retrieve form data
    $nationalId = $_POST['National_ID'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $firstName = $_POST['First_Name'];
    $lastName = $_POST['Last_Name'];
    $phoneNumber = $_POST['Phone_number'];
    $dateOfBirth = $_POST['Date_of_Birth'];
    $userRole = $_POST['user_role'];

    // Prepare SQL statement to insert user data into the database
    $insertStmt = $pdo->prepare("INSERT INTO users (National_ID, Username, pwd, Email, First_Name, Last_Name, Phone_number, Date_of_Birth, user_role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertStmt->execute([$nationalId, $username, $password, $email, $firstName, $lastName, $phoneNumber, $dateOfBirth, $userRole]);

    $_SESSION['message'] = "New user added successfully.";

    header("Location: users_management.php");
    exit();
}
// Redirect back to users_management.php in case of direct access
header("Location: users_management.php");
exit();
?>