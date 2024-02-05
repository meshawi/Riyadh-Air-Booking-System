<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get username and password from the POST data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    function insertLog($pdo, $message, $category)
    {
        $sql = "INSERT INTO logs (message, category) VALUES (:message, :category)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['message' => $message, 'category' => $category]);
    }

    try {
        // Include the database connection file
        require_once 'dbh.inc.php';

        // SQL query to retrieve user information based on the username
        $query = "SELECT * FROM users WHERE Username = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);

        // Fetch the user data as an associative array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($user) {
            // Verify the entered password
            if (password_verify($password, $user['pwd'])) {
                session_start();
                $_SESSION['user_id'] = $user['National_ID'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['user_role'] = $user['user_role'];
                $_SESSION['first_name'] = $user['First_Name'];
                $_SESSION['last_name'] = $user['Last_Name'];
                $_SESSION['email'] = $user['Email'];
                $_SESSION['date_of_birth'] = $user['Date_of_Birth'];
                insertLog($pdo, 'User logged in successfully', $_SESSION['username']);
                header("Location: ../index.php");
                die();
            } else {
                // Invalid password, display an alert and redirect to the login page
                echo "<script> window.location.href = '../Login_Page/login.php'; alert('Incorrect Password. Please try again'); </script>";
                die();
            }
        } else {
            // User not found, display an alert and redirect to the login page
            echo "<script>alert('Incorrect username. Please try again'); window.location.href = '../Login_Page/login.php';</script>";
            die();
        }

    } catch (PDOException $e) {
        // Handle database connection errors
        die('Query failed: ' . $e->getMessage());
    } finally {
        // Close the database connection
        $pdo = null;
    }
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: ../login.php");
}

?>
