<?php
include 'dbh.inc.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flightID = $_POST['flightID'];

    // Retrieve the classType from the bookings table
    $sql = "SELECT classType FROM bookings WHERE flightID = :flightID LIMIT 1";
    $stmt = $pdo->prepare($sql);

    // Update the booking status in the database
    $sql = "UPDATE bookings SET status = 'Paid' WHERE flightID = :flightID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':flightID', $flightID);

    try {
        $stmt->execute();

        // Set the session variables
        $_SESSION['flightID'] = $flightID;

        echo "Payment successful. Booking status updated to Paid.";

        // After processing the payment
        header("Location: ../Seats/seat_selection.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>