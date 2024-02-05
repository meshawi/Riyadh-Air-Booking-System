<?php
session_start();
include '../incloudes/dbh.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../Login_Page/login.php");
    exit;
}

$userID = $_SESSION['user_id'];




// Handle cancellation request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'cancel' && isset($_POST['bookingID'])) {
    $bookingID = $_POST['bookingID'];

    // Perform the cancellation
    $stmt = $pdo->prepare("UPDATE bookings SET status = 'canceled' WHERE bookingID = ? AND bookedBy = ?");
    $stmt->execute([$bookingID, $userID]);

}

// Fetch user details
$stmt = $pdo->prepare("SELECT * FROM users WHERE National_ID = ?");
$stmt->execute([$userID]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Account Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="print_Ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="ticket.css">
    <link rel="stylesheet" href="UserAccountDetails.css">
    <link rel="stylesheet" href="account_details.css">

    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../assets/css/globalFont.css">

</head>

<body>


    <div id="main-content">

        <section id="new-section" class="two-column-section">
            <!-- =============== Include navbar  =============== -->
            <?php
            include '../assets/Inc_files/INC_NAV.php';
            ?>
        </section>


        <!-- =============== Start User Account Detail Section =============== -->

        <section id="user-account-details" class="two-column-section">



            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">
                        <div class="col-xl-6 col-md-12">
                            <div class="user-card-container">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25">
                                                <img src="<?php echo htmlspecialchars($user['profile_image']); ?>"
                                                    class="img-radius" alt="User-Profile-Image">
                                            </div>
                                            <h6 class="f-w-600">
                                                <?php echo htmlspecialchars($user['First_Name'] . ' ' . $user['Last_Name']); ?>
                                            </h6>
                                            <p>
                                                <?php echo htmlspecialchars($user['Username']); ?>
                                            </p>
                                            <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h1 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h1>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400">
                                                        <?php echo htmlspecialchars($user['Email']); ?>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Phone Number</p>
                                                    <h6 class="text-muted f-w-400">
                                                        <?php echo htmlspecialchars($user['Phone_number']); ?>
                                                    </h6>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Date Of Birth</p>
                                                    <h6 class="text-muted f-w-400">
                                                        <?php echo htmlspecialchars($user['Date_of_Birth']); ?>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">User Role</p>
                                                    <h6 class="text-muted f-w-400">
                                                        <?php echo htmlspecialchars($user['user_role']); ?>
                                                    </h6>
                                                </div>
                                            </div>
                                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                <!-- Social Links -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =============== End User Account Detail Section =============== -->

            <!-- =============== Start Update Info Form Section =============== -->
            <div class="update-info-container">
                <form method="post" action="../incloudes/update_info_process.php" enctype="multipart/form-data">
                    <h1>Update Info</h1>
                    <!-- Username Row -->
                    <div class="update-form-row">
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="Username" class="text">Username:</label>
                                <input type="text" name="Username" id="Username"
                                    value="<?php echo htmlspecialchars($user['Username']); ?>" required class="input">
                            </div>
                        </div>
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="pwd" class="text">Password:</label>
                                <input type="password" name="pwd" id="pwd" class="input">
                            </div>
                        </div>
                    </div>

                    <!-- First Name and Last Name Row -->
                    <div class="update-form-row">
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="First_Name" class="text">First Name:</label>
                                <input type="text" name="First_Name" id="First_Name"
                                    value="<?php echo htmlspecialchars($user['First_Name']); ?>" required class="input">
                            </div>
                        </div>
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="Last_Name" class="text">Last Name:</label>
                                <input type="text" name="Last_Name" id="Last_Name"
                                    value="<?php echo htmlspecialchars($user['Last_Name']); ?>" required class="input">
                            </div>
                        </div>
                    </div>

                    <!-- Email and Phone Number Row -->
                    <div class="update-form-row">
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="Email" class="text">Email:</label>
                                <input type="email" name="Email" id="Email"
                                    value="<?php echo htmlspecialchars($user['Email']); ?>" required class="input">
                            </div>
                        </div>
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="Phone_number" class="text">Phone Number:</label>
                                <input type="text" name="Phone_number" id="Phone_number"
                                    value="<?php echo htmlspecialchars($user['Phone_number']); ?>" class="input">
                            </div>
                        </div>
                    </div>

                    <!-- Date of Birth Row -->
                    <div class="update-form-row">
                        <div class="update-form-col">
                            <div class="coolinput">
                                <label for="Date_of_Birth" class="text">Date of Birth:</label>
                                <input type="date" name="Date_of_Birth" id="Date_of_Birth"
                                    value="<?php echo htmlspecialchars($user['Date_of_Birth']); ?>" required
                                    class="input">
                            </div>
                        </div>
                        <div class="update-form-col">
                            <input type="file" id="profile_image" name="profile_image" accept="image/*"
                                style="display: none;">


                            <button type="button" id="uploadButton" class="filebtn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125"
                                        stroke="#fffffff" stroke-width="2"></path>
                                    <path d="M17 15V18M17 21V18M17 18H14M17 18H20" stroke="#fffffff" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                ADD Profile Profile Image
                            </button>
                        </div>
                    </div>
                    <input type="submit" class="btn-primary" value="Update">
                </form>
            </div>


        </section>
        <!-- =============== End Update Info Form Section =============== -->


        <!-- =============== Start Booked Section =============== -->
        <section id="booked-tickets">
            <h1 class="section-header">Your Booked Tickets</h1>
            <?php
            $stmt = $pdo->prepare("
    SELECT 
        b.bookingID, b.flightID, b.classType, b.status, b.seatNumber,
        b.nationalID, b.age, b.birthDate, b.title, b.firstName, b.lastName,
        c1.cityName as OriginCity, c2.cityName as DestinationCity, 
        f.DepartureTime, f.ArrivalTime
    FROM bookings b
    JOIN flights f ON b.flightID = f.FlightID
    JOIN cities c1 ON f.originCityID = c1.cityID
    JOIN cities c2 ON f.destinationCityID = c2.cityID
    WHERE b.bookedBy = ?
    ORDER BY b.bookingID
    ");
            $stmt->execute([$userID]);
            $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($tickets) {
                foreach ($tickets as $ticket) {
                    $departureTime = new DateTime($ticket['DepartureTime']);
                    $formattedDepartureTime = $departureTime->format('g:i A, M d, Y'); // Format time
            
                    $arrivalTime = new DateTime($ticket['ArrivalTime']);
                    $formattedArrivalTime = $arrivalTime->format('g:i A, M d, Y'); // Format time
                    // New ticket layout
                    ?>

                    <div class="boarding-pass">
                        <header>
                            <div class="logo">
                                <img src="../assets/imgs/Riyadh_Air_Logo.svg white.png" class="logo" alt=""
                                    style="width: 200px; height: auto;">
                            </div>
                            <div class="flight">
                                <small>Flight</small>
                                <strong>
                                    <?= htmlspecialchars($ticket['flightID']) ?>
                                </strong>
                            </div>
                        </header>
                        <div class="cities">
                            <div class="city">
                                <small>From</small>
                                <strong>
                                    <?= htmlspecialchars($ticket['OriginCity']) ?>
                                </strong>
                            </div>
                            <div class="city">
                                <small>To</small>
                                <strong>
                                    <?= htmlspecialchars($ticket['DestinationCity']) ?>
                                </strong>
                            </div>
                            <div class="airplane">✈</div>
                        </div>
                        <div class="infos">
                            <div class="places">
                                <div class="box">
                                    <small>Seat</small>
                                    <strong>
                                        <?= htmlspecialchars($ticket['seatNumber']) ?>
                                    </strong>
                                </div>
                                <div class="box">
                                    <small>Class</small>
                                    <strong>
                                        <?= htmlspecialchars($ticket['classType']) ?>
                                    </strong>
                                </div>
                            </div>

                            <div class="times">
                                <div class="box">
                                    <small>Departure</small>
                                    <strong>
                                        <?= $formattedDepartureTime ?>
                                    </strong>
                                </div>
                                <div class="box">
                                    <small>Arrival</small>
                                    <strong>
                                        <?= $formattedArrivalTime ?>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="strap">
                            <div class="box">
                                <div>
                                    <small>Name</small>
                                    <strong>
                                        <?= htmlspecialchars($ticket['firstName']) ?>
                                        <?= htmlspecialchars($ticket['lastName']) ?>
                                    </strong>
                                </div>
                                <div>
                                    <small>Status</small>
                                    <strong>
                                        <?= htmlspecialchars($ticket['status']) ?>
                                    </strong>
                                </div>
                            </div>
                            <div class="qrcode" onclick="printTicket(this.parentElement.parentElement.outerHTML)">
                                <img class="qrcode" src="../assets/imgs/print_icon.jpg" alt="">
                            </div>



                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No tickets booked.</p>";
            }
            ?>

            <!-- partial -->

        </section>

    </div>
    </div>
    <!-- =============== End Booked Section =============== -->


    <script>
        function printTicket(ticketHtml) {
            var printFrame = document.getElementById('printFrame');
            printFrame.contentDocument.write(ticketHtml);
            printFrame.contentDocument.close();
            printFrame.contentWindow.focus();

            // Apply styles if needed
            var styleSheetLink = printFrame.contentDocument.createElement("link");
            styleSheetLink.rel = "stylesheet";
            styleSheetLink.href = "ticket.css"; // The path to your stylesheet
            printFrame.contentDocument.head.appendChild(styleSheetLink);

            printFrame.contentWindow.print();
        }



        function confirmCancellation(bookingID) {
            var confirmAction = confirm("Are you sure you want to cancel this booking?");
            if (confirmAction) {
                // User confirmed cancellation
                document.getElementById('cancelForm_' + bookingID).submit();
            } else {
                // User canceled the action
                console.log("Cancellation aborted.");
            }
        }



        document.getElementById('uploadButton').addEventListener('click', function () {
            document.getElementById('profile_image').click();
        });

    </script>

    <!-- Add this in your HTML, preferably near the bottom of the body -->
    <iframe id="printFrame" style="display: none;"></iframe>

</body>

</html>