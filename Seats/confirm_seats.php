<?php
session_start();
include '../incloudes/dbh.inc.php'; 

if (!isset($_SESSION['flightID'], $_POST['selectedSeats'])) {
    echo "Error: Required information is missing.";
    exit;
}

$flightID = $_SESSION['flightID'];
$selectedSeats = $_POST['selectedSeats'];

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Error: User not logged in or session expired.";
    exit;
}

$userID = $_SESSION['user_id'];

// Fetch the bookingID
$sql = "SELECT MAX(bookingID) AS bookingID FROM bookings WHERE flightID = :flightID AND bookedBy = :userID";
$stmt = $pdo->prepare($sql);
$stmt->execute(['flightID' => $flightID, 'userID' => $userID]);


$booking = $stmt->fetch(PDO::FETCH_ASSOC);
$bookingID = $booking['bookingID'] ?? null;

if (!$bookingID) {
    echo "Error: Booking ID not found for this flight.";
    exit;
}

foreach ($selectedSeats as $passengerIndex => $seatNumber) {
    // Update seatPositions table
    $sql = "UPDATE seatPositions SET isOccupied = 1 WHERE flightID = :flightID AND seatNumber = :seatNumber";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['flightID' => $flightID, 'seatNumber' => $seatNumber]);

    // Link the seat to the booking
    $sql = "UPDATE bookings SET seatNumber = :seatNumber WHERE flightID = :flightID AND bookedBy = :userID AND bookingID = (SELECT MAX(bookingID) FROM bookings WHERE bookedBy = :userID AND flightID = :flightID)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['seatNumber' => $seatNumber, 'flightID' => $flightID, 'userID' => $_SESSION['user_id']]);
}

echo "Seats successfully confirmed.";
header("Location: ../Accessories/Ratings/RatingsIn.php");
