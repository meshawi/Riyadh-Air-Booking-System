<?php
session_start();
include '../incloudes/dbh.inc.php';
include 'flights_management_process.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../Login_Page/login.php");
    exit();
}

$bookings = getAllBookings($pdo);
$searchResults = $_SESSION['searchResults'] ?? [];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>

    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/flights_management.css">



</head>

<body>
    <!-- =============== Start Sidebar Section =============== -->

    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">Administration Dashboard</h3>
            <ul>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="flights_management.php">
                        <i class="fa-solid fa-plane-lock"></i>
                        <span>Flights And Bookings</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="users_management.php">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="Support_management.php">
                        <i class="fa-solid fa-headset"></i>
                        <span>Support</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="Logs.php">
                        <i class="fa-regular fa-clipboard"></i>
                        <span>Logs</span>
                    </a>
                </li>

                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="files.php">
                        <i class="fa-solid fa-file-code"></i>
                        <span>Files</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../index.php">
                        <i class="fa-solid fa-house"></i>
                        <span>Home Page</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- =============== End Sidebar Section =============== -->

        <!-- =============== Start Flights And Bookings Section =============== -->

        <div class="content w-full">

            <h1 class="p-relative">Flights And Bookings</h1>
            <div class="settings-page m-20 d-grid gap-20">
                <div class="flex-container">

                    <div class="container">

                        <!-- Display All Bookings -->
                        <h2>All Bookings</h2>
                        <table>
                            <!-- Table Headers -->
                            <tr>
                                <th>Booking ID</th>
                                <th>Flight ID</th>
                                <th>Passenger Name</th>
                                <th>nationalID </th>
                                <th>age </th>
                                <th>birthDate </th>
                                <th>title </th>
                                <th>status </th>
                                <th>classType </th>
                                <th>bookedBy </th>
                                <th>Seat Number </th>

                            </tr>
                            <!-- Table Data -->
                            <?php foreach ($bookings as $booking): ?>
                                <tr>
                                    <td>
                                        <?php echo htmlspecialchars($booking['bookingID']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['flightID']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['firstName'] . ' ' . $booking['lastName']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['nationalID']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['age']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['birthDate']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['title']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['status']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['classType']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['bookedBy']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($booking['seatNumber']); ?>
                                    </td>
                                </tr>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>


                    <!-- Search Flights Section -->
                    <div class="container">
                        <h2>Search Flights</h2>
                        <form method="GET" class="sf">
                            <h2>Seach through flights</h2>
                            <input type="text" name="flightID" id="flightID" placeholder="Search by Flight ID:" />
                            <br>
                            <br>
                            <input type="text" name="departureTime" id="departureTime"
                                placeholder="Search by Departure Time:" />
                            <br> <br>

                            <input type="submit" name="searchFlights" value="Search" />
                        </form>

                        <?php
                        // Handle flight search
                        if (isset($_GET['searchFlights'])) {
                            $flightID = $_GET['flightID'];
                            $departureTime = $_GET['departureTime'];

                            // Validate and sanitize user input to prevent SQL injection
                            $flightID = htmlspecialchars($flightID);
                            $departureTime = htmlspecialchars($departureTime);

                            // Build SQL query for flight search
                            $sql = "SELECT 
                    f.FlightID, f.DepartureTime, f.ArrivalTime, 
                    c1.cityName AS originCity, c2.cityName AS destinationCity
                FROM flights f
                JOIN cities c1 ON f.originCityID = c1.cityID
                JOIN cities c2 ON f.destinationCityID = c2.cityID
                WHERE 1=1"; // 1=1 is a placeholder to build dynamic query
                        
                            // Add conditions based on user input
                            if (!empty($flightID)) {
                                $sql .= " AND f.FlightID = :flightID";
                            }
                            if (!empty($departureTime)) {
                                $sql .= " AND f.DepartureTime = :departureTime";
                            }

                            try {
                                $stmt = $pdo->prepare($sql);

                                // Bind parameters
                                if (!empty($flightID)) {
                                    $stmt->bindParam(':flightID', $flightID);
                                }
                                if (!empty($departureTime)) {
                                    $stmt->bindParam(':departureTime', $departureTime);
                                }

                                $stmt->execute();
                                $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Display search results
                                if (count($searchResults) > 0) {
                                    echo "<h3>Search Results:</h3>";
                                    echo "<table>";
                                    // Display table headers
                                    echo "<tr>";
                                    echo "<th>Flight ID</th>";
                                    echo "<th>Departure Time</th>";
                                    echo "<th>Arrival Time</th>";
                                    echo "<th>Origin City</th>";
                                    echo "<th>Destination City</th>";
                                    echo "</tr>";
                                    // Display search results in table rows
                                    foreach ($searchResults as $result) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($result['FlightID']) . "</td>";
                                        echo "<td>" . htmlspecialchars($result['DepartureTime']) . "</td>";
                                        echo "<td>" . htmlspecialchars($result['ArrivalTime']) . "</td>";
                                        echo "<td>" . htmlspecialchars($result['originCity']) . "</td>";
                                        echo "<td>" . htmlspecialchars($result['destinationCity']) . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "No flights found matching the search criteria.";
                                }
                            } catch (PDOException $e) {
                                die("Error: " . $e->getMessage());
                            }
                        }
                        ?>
                    </div>

                    <!-- Edit Flights Section -->
                    <div class="container">
                        <h2>Edit Flights</h2>
                        <form method="POST" class="sf">
                            <label for="editFlightID">Search Flight by Flight ID:</label>
                            <input type="text" name="editFlightID" id="editFlightID" placeholder="Enter Flight ID" />
                            <input type="submit" name="searchFlight" value="Search" />
                        </form>

                        <?php
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        /// Handle flight search for editing
                        if (isset($_POST['searchFlight'])) {
                            $editFlightID = $_POST['editFlightID'];

                            // Validate and sanitize user input to prevent SQL injection
                            $editFlightID = htmlspecialchars($editFlightID);

                            // Build SQL query to fetch flight details
                            $sql = "SELECT * FROM flights WHERE FlightID = :editFlightID";

                            try {
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':editFlightID', $editFlightID);
                                $stmt->execute();
                                $flightDetails = $stmt->fetch(PDO::FETCH_ASSOC);

                                // Display flight details for editing
                                if ($flightDetails) {
                                    echo "<h3>Edit Flight Details</h3>";
                                    echo "<form method='POST' onsubmit='return updateFlight();'>";
                                    echo "<input type='hidden' name='flightID' value='" . htmlspecialchars($flightDetails['FlightID']) . "' />";

                                    // Display input fields for all columns
                                    foreach ($flightDetails as $column => $value) {
                                        echo "<label for='$column'>$column:</label>";
                                        echo "<input type='text' name='$column' id='$column' value='" . htmlspecialchars($value) . "' />";
                                    }

                                    echo "<input type='submit' name='updateFlight' value='Update Flight' />";
                                    echo "</form>";

                                    // Debugging messages
                                    echo "<script>console.log('Flight details loaded for editing.');</script>";
                                } else {
                                    echo "Flight not found.";
                                }
                            } catch (PDOException $e) {
                                die("Error fetching flight details: " . $e->getMessage());
                            }
                        }

                        // Handle updating flight details
                        if (isset($_POST['updateFlight'])) {
                            echo "<script>console.log('Update Flight button clicked.');</script>";

                            $updateFlightID = $_POST['flightID'];

                            // Build SQL query to update all columns
                            $updateSql = "UPDATE flights SET ";

                            // Bind parameters for update
                            $updateParams = array(':updateFlightID' => $updateFlightID);

                            foreach ($_POST as $key => $value) {
                                // Skip non-column fields
                                if ($key != 'updateFlight' && $key != 'flightID') {
                                    $updateSql .= "$key = :$key, ";
                                    $updateParams[":$key"] = $value;
                                }
                            }

                            $updateSql = rtrim($updateSql, ', '); // Remove the trailing comma and space
                            $updateSql .= " WHERE FlightID = :updateFlightID";

                            try {
                                $updateStmt = $pdo->prepare($updateSql);
                                $updateStmt->execute($updateParams);
                                echo "Flight details updated successfully!";
                                echo "<script>console.log('Flight details updated successfully.');</script>";
                            } catch (PDOException $e) {
                                die("Error updating flight details: " . $e->getMessage());
                            }
                        }
                        ?>

                    </div>


                    <!-- Edit or Delete Bookings Section -->
                    <div class="container">
                        <h2>Edit or Delete Bookings</h2>
                        <form method="POST">
                            <label for="bookingID">Enter Booking ID:</label>
                            <input type="text" name="bookingID" id="bookingID" placeholder="Booking ID" required />
                            <input type="submit" name="searchBooking" value="Search Booking" />
                        </form>

                        <?php
                        if (isset($_POST['searchBooking'])) {
                            $bookingID = $_POST['bookingID'];
                            $stmt = $pdo->prepare("SELECT * FROM bookings WHERE bookingID = :bookingID");
                            $stmt->execute(['bookingID' => $bookingID]);
                            $booking = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($booking) {
                                echo "<form method='POST'>";
                                foreach ($booking as $key => $value) {
                                    if ($key != 'bookingID') { // Don't allow editing of bookingID
                                        echo "<label for='$key'>$key:</label>";
                                        echo "<input type='text' name='$key' id='$key' value='" . htmlspecialchars($value) . "' /><br>";
                                    }
                                }
                                echo "<input type='hidden' name='bookingID' value='" . htmlspecialchars($bookingID) . "' />";
                                echo "<input type='submit' name='updateBooking' value='Update Booking' />";
                                echo "<input type='submit' name='deleteBooking' value='Delete Booking' />";
                                echo "</form>";
                            } else {
                                echo "Booking not found.";
                            }
                        }

                        if (isset($_POST['updateBooking'])) {
                            $bookingID = $_POST['bookingID'];
                            // Update query preparation
                            $updateQuery = "UPDATE bookings SET ";
                            foreach ($_POST as $key => $value) {
                                if ($key != 'bookingID' && $key != 'updateBooking') {
                                    $updateQuery .= "$key = :$key, ";
                                }
                            }
                            $updateQuery = rtrim($updateQuery, ', '); // Remove the trailing comma
                            $updateQuery .= " WHERE bookingID = :bookingID";

                            $updateStmt = $pdo->prepare($updateQuery);

                            // Bind parameters dynamically
                            foreach ($_POST as $key => $value) {
                                if ($key != 'bookingID' && $key != 'updateBooking') {
                                    $updateStmt->bindValue(":$key", $value);
                                }
                            }
                            $updateStmt->bindValue(':bookingID', $bookingID);
                            $updateStmt->execute();

                            echo "Booking updated successfully.";
                        }

                        if (isset($_POST['deleteBooking'])) {
                            $bookingID = $_POST['bookingID'];
                            $deleteStmt = $pdo->prepare("DELETE FROM bookings WHERE bookingID = :bookingID");
                            $deleteStmt->execute(['bookingID' => $bookingID]);
                            echo "Booking deleted successfully.";
                        }

                        ?>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- =============== End Flights And Bookings Section =============== -->

</body>

</html>