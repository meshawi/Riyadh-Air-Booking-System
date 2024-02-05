<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
if (session_destroy()) {
    // Redirect to the login page after logout
    header("Location: ../index.php");
    exit();
} else {
    // Display an error message or log the issue
    echo "Logout failed.";
}
?>