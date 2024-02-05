<?php
session_start();


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
    <title>Booking</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booking Form</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../assets/css/globalFont.css">
</head>

<body>
    <!-- =============== Include navbar  =============== -->
    <?php
    include '../assets/Inc_files/INC_NAV.php';
    ?>

    <!-- =============== Start Booking Section =============== -->

    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="booking-bg"></div>


                        <!-- Booking Form -->
                        <form action="../incloudes/booking_process.php" method="post">
                            <?php
                            $flightID = $_GET['flightID'];
                            $passengers = $_GET['passengers'];
                            echo "<input type='hidden' name='flightID' value='$flightID'>";

                            for ($i = 1; $i <= $passengers; $i++) {
                                echo "<div class='form-header'><h2>Passenger $i</h2></div>";
                                echo "<div class='form-group'>National ID: <input class='form-control' type='text' placeholder='example : 1024535552' name='nationalID[]'></div>";
                                echo "<div class='form-group'>Age: <input class='form-control' type='number' placeholder='example : 18' name='age[]'></div>";
                                echo "<div class='form-group'>Birth Date: <input class='form-control' type='date' name='birthDate[]'></div>";
                                echo "<div class='form-group'>Title: <select class='form-control'  name='title[]'>
                                      <option value='Mr.'>Mr.</option>
                                      <option value='Mrs.'>Mrs.</option>
                                      <option value='Ms.'>Ms.</option>
                                  </select></div>";
                                echo "<div class='form-group'>First Name: <input class='form-control' type='text' placeholder='Enter the First Name' name='firstName[]'></div>";
                                echo "<div class='form-group'>Last Name: <input class='form-control' type='text'  placeholder='Enter the Last Name' name='lastName[]'></div>";
                            }
                            ?>

                            <div class="form-group">
                                <label for="classType">Class Type:</label>
                                <select name="classType" id="classType" onchange="updatePrice()" class="form-control">
                                    <option value="First Class">First Class</option>
                                    <option value="Business">Business</option>
                                    <option value="Economy">Economy</option>
                                </select>
                            </div>

                            <p>Total Price: $<span id="totalPrice">0</span></p>
                            <div class="form-btn">
                                <input type="submit" class="submit-btn" value="Proceed to Payment">
                            </div>
                        </form>

                        <!-- =============== End Booking Section =============== -->

                        <script>
                            // Set initial passenger count and class type
                            var initialPassengers = <?php echo json_encode($passengers); ?>;
                            var initialClassType = document.getElementById('classType').value;

                            // Function to update price
                            // Function to update price
                            function updatePrice() {
                                var classType = document.getElementById('classType').value;
                                var passengers = <?php echo json_encode($passengers); ?>;
                                var pricePerTicket = 0;

                                switch (classType) {
                                    case 'First Class':
                                        pricePerTicket = 300;
                                        break;
                                    case 'Business':
                                        pricePerTicket = 200;
                                        break;
                                    case 'Economy':
                                        pricePerTicket = 100;
                                        break;
                                }

                                var totalPrice = passengers * pricePerTicket;
                                document.getElementById('totalPrice').innerText = totalPrice;
                            }

                            // Initialize price calculation
                            window.onload = function () {
                                updatePrice();
                            }

                            // Initialize price calculation
                            window.onload = function () {
                                updatePrice();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>