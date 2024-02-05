<?php
session_start();
include '../incloudes/dbh.inc.php';

$searchResults = null;

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../Login_Page/login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departureDate'];
    $passengers = $_POST['passengers'];

    // SQL query and logic here
    $sql = "SELECT f.FlightID, f.DepartureTime, 
                   c1.cityName AS OriginCity, 
                   c2.cityName AS DestinationCity 
            FROM flights f
            JOIN cities c1 ON f.originCityID = c1.cityID
            JOIN cities c2 ON f.destinationCityID = c2.cityID
            WHERE f.originCityID = :originCityID AND 
                  f.destinationCityID = :destinationCityID AND 
                  DATE(f.DepartureTime) = :departureDate";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':originCityID', $origin, PDO::PARAM_INT);
    $stmt->bindParam(':destinationCityID', $destination, PDO::PARAM_INT);
    $stmt->bindParam(':departureDate', $departureDate);
    $stmt->execute();

    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch cities from the database for the form
$stmt = $pdo->prepare("SELECT cityID, cityName FROM cities");
$stmt->execute();
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flight Search</title>
    <link rel="stylesheet" href="flight_search.css">
    <link rel="stylesheet" href="../assets/css/creative-studio.css">
    <!-- Google font -->
    <link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-FfBionFdO8/fZEOgqnBPUpsxE8E+LUMFPT7loRNCsBSi/FOAiS6Wf25zfcNl4lOy" crossorigin="anonymous">


    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../assets/css/globalFont.css">

</head>

<body>
    <!-- =============== Include navbar  =============== -->
    <?php
    include '../assets/Inc_files/INC_NAV.php';
    ?>
    <div class="container">


        <!-- =============== Start booking Section =============== -->
        <div id="booking" class="section">



            <div class="section-center">

                <div class="container">

                    <div class="row">
                        <div class="booking-form">
                            <div class="booking-bg">
                                <div class="form-header">
                                    <h2><br>Make your reservation</h2>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosamnumquam at</p> -->
                                </div>
                            </div>
                            <form action="flight_search.php" method="post" id="flightSearchForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Departure Date:</span>
                                            <input type="date" id="departureDate" name="departureDate"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Num of Passengers:</span>
                                            <input type="number" id="passengers" name="passengers" min="1" max="7"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Origin</span>
                                            <select name="origin" id="origin" onchange="updateDestinationOptions();"
                                                class="form-control">
                                                <?php foreach ($cities as $city): ?>
                                                    <option value="<?php echo htmlspecialchars($city['cityID']); ?>">
                                                        <?php echo htmlspecialchars($city['cityName']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Destination</span>
                                            <select name="destination" id="destination"
                                                onchange="updateOriginOptions();" class="form-control">
                                                <?php foreach ($cities as $city): ?>
                                                    <option value="<?php echo htmlspecialchars($city['cityID']); ?>">
                                                        <?php echo htmlspecialchars($city['cityName']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit" value="Search Flights">Check
                                        availability</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- =============== End Booking Section =============== -->


                <!-- =============== Start Result Section =============== -->

                <div id="results">
                    <?php if (isset($searchResults) && count($searchResults) > 0): ?>
                        <div id="results">
                            <?php foreach ($searchResults as $row): ?>
                                <!-- Display each result row -->
                                <p>
                                    FlightID:
                                    <?= htmlspecialchars($row["FlightID"]) ?> -
                                    Origin:
                                    <?= htmlspecialchars($row["OriginCity"]) ?> -
                                    Destination:
                                    <?= htmlspecialchars($row["DestinationCity"]) ?> -
                                    Departure Time:
                                    <?= htmlspecialchars($row["DepartureTime"]) ?>
                                    <a
                                        href='../Bookings/booking.php?flightID=<?= htmlspecialchars($row["FlightID"]) ?>&passengers=<?= htmlspecialchars($passengers) ?>'>Book
                                        This Flight</a>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                    <p>No flights found for the selected criteria.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- =============== End Result Section =============== -->


    <!-- JavaScript for setting the minimum departure date -->
    <script src="flight_search.js"></script>
</body>

</html>