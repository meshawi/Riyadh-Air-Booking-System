<?php
session_start();
include '../incloudes/dbh.inc.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../Login_Page/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Seat Selection Page</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="seat_selection.css">

    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../assets/css/globalFont.css">
</head>

<body>

    <!-- =============== Include navbar  =============== -->
    <?php
    include '../assets/Inc_files/INC_NAV.php';
    ?>

    <!-- =============== Start Seats Image Section =============== -->

    <div class="header-container">
        <img src="../assets/imgs/PlainSeats.png" alt="Header Image" class="header-image">
        <h1 class="header-title">Seat Selection</h1>
    </div>

    <!-- =============== End Seats Image Section =============== -->

    <!-- =============== Start Seats Selection Section =============== -->

    <?php
    // Check if necessary session variables are set
    if (!isset($_SESSION['flightID'], $_SESSION['classType'], $_SESSION['passengers'])) {
        echo "Booking information not found. Please start your booking process again.";
        exit;
    }

    // Retrieve necessary session variables
    $flightID = $_SESSION['flightID'];
    $classType = $_SESSION['classType'];
    $passengers = $_SESSION['passengers'];

    // Function to get seats based on classType and occupancy
    function getSeats($pdo, $flightID, $classType, $isOccupied)
    {
        $sql = "SELECT seatNumber FROM seatPositions WHERE flightID = :flightID AND classType = :classType AND isOccupied = :isOccupied";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':flightID', $flightID, PDO::PARAM_INT);
        $stmt->bindParam(':classType', $classType, PDO::PARAM_STR);
        $stmt->bindParam(':isOccupied', $isOccupied, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            // Add error handling
            $errorInfo = $stmt->errorInfo();
            echo "Error executing query: " . $errorInfo[2];
            return [];
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch available and unavailable seats for the flight
    $availableSeats = getSeats($pdo, $flightID, $classType, 0); // 0 for not occupied
    $unavailableSeats = getSeats($pdo, $flightID, $classType, 1); // 1 for occupied
    
    if (empty($availableSeats)) {
        echo "<p>No available seats found.</p>";
    }

    echo "<form action='confirm_seats.php' method='post'>";
    for ($i = 1; $i <= $passengers; $i++) {
        echo "<h3>Passenger $i: Select a Seat (Class: $classType)</h3>";
        echo "<table border='1px'>";
        echo "<tr><th>Available Seats</th><th>Unavailable Seats</th></tr>";
        echo "<tr><td>";

        // List available seats
        foreach ($availableSeats as $seat) {
            echo "<input type='radio' name='selectedSeats[$i]' value='" . $seat['seatNumber'] . "'>" . $seat['seatNumber'] . "<br>";
        }

        echo "</td><td>";

        // List unavailable seats
        foreach ($unavailableSeats as $seat) {
            echo "<span style='color: red;'>" . $seat['seatNumber'] . "</span><br>";
        }

        echo "</td></tr>";
        echo "</table>";
    }
    echo "<input type='hidden' name='flightID' value='$flightID'>";
    echo "<input type='submit' value='Confirm Seats' class='btn btn-primary'> ";
    echo "</form>";
    ?>
    <!-- =============== End Seats Selection Section =============== -->
</body>

</html>