<?php
include 'dbh.inc.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the logged-in user's ID from the session
    $bookedByUserID = $_SESSION['user_id'];
    $flightID = $_POST['flightID'];
    $classType = $_POST['classType'];
    $nationalIDs = $_POST['nationalID'];
    $ages = $_POST['age'];
    $birthDates = $_POST['birthDate'];
    $titles = $_POST['title'];
    $firstNames = $_POST['firstName'];
    $lastNames = $_POST['lastName'];

    // Define the SQL query
    $sql = "INSERT INTO bookings (flightID, classType, nationalID, age, birthDate, title, firstName, lastName, status, bookedBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Waiting for Payment', ?)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // The number of passengers is the count of nationalIDs (or any other passenger-specific array)
    $passengers = count($nationalIDs);
    // Loop through each passenger and execute the statement
    for ($i = 0; $i < count($nationalIDs); $i++) {
        $stmt->execute([
            $flightID,
            $classType,
            $nationalIDs[$i],
            $ages[$i],
            $birthDates[$i],
            $titles[$i],
            $firstNames[$i],
            $lastNames[$i],
            $bookedByUserID
        ]);

        // Fetch the newly created booking ID
        $bookingID = $pdo->lastInsertId();

        // Assign a seat
        $seatQuery = "SELECT seatNumber FROM seatPositions WHERE flightID = ? AND classType = ? AND isOccupied = 0 LIMIT 1";
        $seatStmt = $pdo->prepare($seatQuery);
        $seatStmt->execute([$flightID, $classType]);
        if ($seatRow = $seatStmt->fetch(PDO::FETCH_ASSOC)) {
            $selectedSeatNumber = $seatRow['seatNumber'];
            $updateSeatQuery = "UPDATE seatPositions SET isOccupied = 1, bookingID = ? WHERE seatNumber = ? AND flightID = ?";
            $updateSeatStmt = $pdo->prepare($updateSeatQuery);
            $updateSeatStmt->execute([$bookingID, $selectedSeatNumber, $flightID]);
        }
    }

    // Function to calculate the total price
    function calculateTotalPrice($classType, $passengers)
    {
        // Define prices per class
        $pricePerTicket = 0;

        switch ($classType) {
            case 'First Class':
                $pricePerTicket = 300;
                break;
            case 'Business':
                $pricePerTicket = 200;
                break;
            case 'Economy':
                $pricePerTicket = 100;
                break;
        }

        // Calculate the total price
        $totalPrice = $pricePerTicket * $passengers;

        return $totalPrice;
    }

    $passengers = count($nationalIDs);
    $totalPrice = calculateTotalPrice($classType, $passengers);

    // Set session variables
    $_SESSION['flightID'] = $flightID;
    $_SESSION['passengers'] = $passengers;
    $_SESSION['totalPrice'] = calculateTotalPrice($classType, $passengers);
    $_SESSION['classType'] = $classType;

    // Redirect directly to seat_selection.php for testing
    header("Location: ../Payment/payment.php");
    exit();
}
?>