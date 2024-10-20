<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
}


// Call trackVisit() on every page where you want to track visits

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aleshawi Airlines</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap + Creative Studio main styles -->
    <link rel="stylesheet" href="assets/css/creative-studio.css">


</head>

<body>
    <!-- Include the database connection file -->
    <?php include 'incloudes/dbh.inc.php'; ?>

    <!-- Include the visit tracking PHP file at the top of your HTML file -->
    <?php include 'incloudes/tracker.php'; ?>

    <i id="home"></i>

    <!-- =============== nav-header incloudes Section =============== -->

    <?php include("assets/Inc_files/navbar.php"); ?>
    <?php include("assets/Inc_files/header.php"); ?>


    <!-- =============== Start Box Section =============== -->
    <div class="box text-center">
        <div class="box-item">
            <i class="ti-vector"></i>
            <h6 class="box-title">UX/UI Design</h6>
            <p>Our website has intuitive and user-friendly interface that enables effortless navigation, empowering
                users to seamlessly search, select, and book flights with ease.</p>
        </div>
        <div class="box-item">
            <i class="ti-settings"></i>
            <h6 class="box-title">User Account Management</h6>
            <p>Our website allows users to review and modify their profiles, track their booking history, and manage
                personal preferences, fostering a sense of control.</p>
        </div>
        <div class="box-item">
            <i class="ti-mobile"></i>
            <h6 class="box-title">Responsive Web Design</h6>
            <p>Our website offers a seamless experience with responsive design, ensuring optimal functionality on
                desktops, tablets, and smartphones.</p>
        </div>
    </div>
    <!-- =============== End Box Section =============== -->


    <!-- =============== Start About Section =============== -->
    <section id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-4">
                    <img src="assets/imgs/about.jpg"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page"
                        class="w-100 img-thumbnail mb-3">
                </div>
                <div class="col-md-7 col-lg-8" style="background-color:white; border-radius: 9px; padding:20px;">
                    <h6 class="section-subtitle mb-0"> About us</h6>
                    <h6 class="section-title mb-3">Aleshawi AIR</h6>
                    <p>Our history began on September 30, 1945, when King Abdulaziz Al Saud, the first King and founder
                        of Saudi Arabia, flew from the Aleshawi province to Taif, establishing the country’s first base of
                        civil aviation.</p>
                    <p>A new era in the Kingdom’s aviation history begins with Aleshawi Air.</p>
                    <p>Optimizing the Kingdom’s strategic location, Aleshawi Air will showcase Saudi’s exciting cultural
                        and natural attractions to tourists around the world and embody the nation’s authentic
                        hospitality.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End About Section =============== -->


    <!-- =============== Start About with bg Section =============== -->
    <section class="has-bg-img py-md">
        <div class="container text-center">
            <h6 class="section-subtitle">We plan to</h6>
            <h6 class="section-title mb-6">Reaching New Heights</h6>
            <div class="widget mb-4">
                <div class="widget-item">
                    <i class="ti-bag"></i>
                    <h4>Fly</h4>
                </div>
                <div class="widget-item">
                    <i class="ti-wand"></i>
                    <h4>vision of the future</h4>
                </div>
                <div class="widget-item">
                    <i class="ti-medall-alt"></i>
                    <h4>Hospitality</h4>
                </div>
                <div class="widget-item">
                    <i class="ti-thumb-up"></i>
                    <h4>New Chapter in The Sky</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End About with bg Section =============== -->


    <!-- =============== Start Service Section =============== -->
    <section id="service">
        <div class="container">
            <h6 class="section-subtitle text-center" style="color:white; border-radius: 9px;">Our current and</h6>
            <h5 class="section-title text-center mb-6" style="background-color:white; border-radius: 9px;"> Future
                Service</h5>
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-4"><i class="ti-world text-primary"></i></h2>
                            <h6 class="card-title">The Dynamic Metropolis</h6>
                            <p>An ambitious vision for the future, Aleshawi Air embodies Saudi Arabia's capital Riyadh at
                                40,000 ft in the sky.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-4"><i class="ti-harddrives text-primary"></i></h2>
                            <h6 class="card-title">Technology</h6>
                            <p>Aleshawi Air will be the first digital-native airline, enabling digital innovation at every
                                guest touchpoint for a seamless travel experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-4"><i class="ti-crown text-primary"></i></h2>
                            <h6 class="card-title">Hospitality</h6>
                            <p>Aleshawi Air will bring warm and authentic Saudi hospitality to the skies, and will
                                showcase Saudi Arabia's exciting cultural</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-4"><i class="ti-face-smile text-primary"></i></h2>
                            <h6 class="card-title">Enjoying the wonders of Saudi Arabia</h6>
                            <p>Aleshawi Air will showcase natural attractions to tourists worldwide and embody the
                                nation's authentic hospitality. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-4"><i class="ti-medall text-primary"></i></h2>
                            <h6 class="card-title">The Future Takes Flight</h6>
                            <p>The city that is already transforming the way we live is now redefining the way we fly.
                                Welcome to Aleshawi Air, a brand-new chapter in the sky. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-4"><i class="ti-layers text-primary"></i></h2>
                            <h6 class="card-title">100+ destinations</h6>
                            <p>Aleshawi Air connecting business and leisure travelers to more than 100 destinations
                                worldwide by 2030.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =============== End Service Section =============== -->



    <!-- =============== Start Portfolio Section =============== -->
    <section id="portfolio">
        <div class="container text-center">
            <h6 class="section-subtitle" style="color:white; border-radius: 9px;">Explore & Plan:</h6>
            <h6 class="section-title mb-5" style="color:white; border-radius: 9px;">Your Travel Toolkit</h6>
            <div class="row">
                <div class="col-sm-4">
                    <div class="img-wrapper">
                        <img src="assets/imgs/folio-1.jpg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>Festivals</h5>
                                <h6>Search for the best Festivals and Activities in your desierd city</h6>
                                <a href="Accessories/tourism/festivals.php"><i class="fa fa-arrow-circle-up"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <img src="assets/imgs/folio-2.jpg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>Best Hotels</h5>
                                <h6>Search for the best Hotels in your desierd city</h6>
                                <a href="Accessories/hotels/index.php"><i class="fa fa-arrow-circle-up"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="img-wrapper">
                        <img src="assets/imgs/folio-3.jpg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>Currency Converter</h5>
                                <h6>Convert any ammount of money based on your needs</h6>
                                <a href="Accessories/Currency_Converter/index.html" target='_blank'><i
                                        class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <img src="assets/imgs/folio-4.jpg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>Tourism</h5>
                                <h6>See the Tourism giude for your city to Enjoy your travle</h6>
                                <a href="Accessories/tourism/index.php"><i class="fa fa-arrow-circle-up"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="img-wrapper">
                        <img src="assets/imgs/folio-5.jpg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>Car Rental</h5>
                                <h6>Search for the best Car Rental places in your city</h6>

                                <a href="Accessories/rent/index.php"><i class="fa fa-arrow-circle-up"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="img-wrapper">
                        <img src="assets/imgs/folio-6.jpg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Creative studio Landing page">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>Weather tool</h5>
                                <h6>Search for your city to see it weather</h6>
                                <a href="Accessories/weatherapp/index.php" target="_blank"><i
                                        class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End Portfolio Section =============== -->


    <!-- =============== Start Team Section =============== -->
    <section id="team">
        <div class="container">
            <h6 class="section-subtitle text-center" style="color:white; border-radius: 9px;">Meet With</h6>
            <h6 class="section-title mb-5 text-center" style="color:white; border-radius: 9px;">Devolpers Team </h6>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card text-center mb-4">
                        <img class="card-img-top inset" src="assets/imgs/avatar.jpg">
                        <div class="card-body">
                            <h6 class="small text-primary font-weight-bold">Project Leader</h6>
                            <h5 class="card-title">Mohammed Aleshawi </h5>
                            <p>Leading with expertise, he handles 90% of the coding workload, ensuring on-time,
                                on-budget project delivery. Coordinates teams, defines objectives, and tackles
                                challenges with finesse</p>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="card text-center mb-4" style="width:600px;height:550px">
                        <img class="card-img-top inset" src="assets/imgs/avatar-1.jpg" style="width:300px;height:300px">
                        <div class="card-body">
                            <h6 class="small text-primary font-weight-bold">Team Members</h6>
                            <h5 class="card-title">Riyadh, Yazzed, Sauod</h5>
                            <p>
                                People solely focused on managing car rentals, hotels, festivals, and tourism pages
                                initially and the Project leader edited most of them.,
                                providing the project leader with some suggestions.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End Team Section =============== -->


    <!-- =============== Start Stats Section =============== -->

    <section class="has-bg-img bg-img-2">
        <div class="container text-center">
            <h6 class="section-subtitle">Tracking Our Success</h6>
            <h6 class="section-title mb-6">The Stats Showcase</h6>
            <div class="widget-2">
                <div class="widget-item">
                    <i class="ti-bar-chart"></i>
                    <h6 class="title">
                        <?php echo getVisitsCount($pdo); ?>
                    </h6>
                    <div class="subtitle">Visits Count</div>
                </div>
                <div class="widget-item">
                    <i class="ti-face-smile"></i>
                    <h6 class="title">
                        <?php echo getAccountsCount($pdo); ?>
                    </h6>
                    <div class="subtitle">Accounts Count</div>
                </div>
                <div class="widget-item">
                    <i class="ti-blackboard"></i>
                    <h6 class="title">
                        <?php echo getBookingsCount($pdo); ?>
                    </h6>
                    <div class="subtitle">Bookings Count</div>
                </div>
                <div class="widget-item">
                    <i class="ti-thumb-up"></i>
                    <h6 class="title">
                        <?php echo getRatingsCount($pdo); ?>
                    </h6>
                    <div class="subtitle">Reviews</div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End Stats Section =============== -->


    <!-- =============== Start testimonial-ratings Section =============== -->

    <?php

    // Fetch reviews with user information from the database
    $query = "
    SELECT r.*, u.Username, u.profile_image
    FROM ratings r
    JOIN users u ON r.user_id = u.National_ID
    ORDER BY r.created_at DESC
    LIMIT 2";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <section id="testimonial">
        <div class="container">
            <h6 class="section-subtitle text-center" style="color:white; border-radius: 9px;">Ratings</h6>
            <h6 class="section-title text-center mb-6" style="color:white; border-radius: 9px;">What Our Clients Say
                <br>
                <button id="openRatingsPopup" class="btn btn-primary">See All Ratings</button>
            </h6>

            <div class="row">
                <?php foreach ($reviews as $review): ?>
                    <div class="col-md-6">
                        <div class="testimonial-wrapper">
                            <div class="img-holder">
                                <?php
                                $profileImage = isset($review['profile_image']) ? 'uploads/' . htmlspecialchars($review['profile_image']) : '';
                                if ($profileImage) {
                                    echo '<img src="' . $profileImage . '" alt="User Profile Image">';
                                } else {
                                    echo '<p>No profile image available</p>';
                                }
                                ?>
                            </div>

                            <div class="body" style="width:4000px;">
                                <h6 class="title">
                                    <?php echo isset($review['Username']) ? htmlspecialchars($review['Username']) : ''; ?>
                                </h6>
                                <div class="ratings">
                                    <?php
                                    $rating = isset($review['rating']) ? $review['rating'] : 0;
                                    for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $rating): ?>
                                            <i class="fa fa-star"></i>
                                        <?php else: ?>
                                            <i class="fa fa-star-o"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <p class="subtitle">
                                    <?php echo isset($review['comment']) ? htmlspecialchars($review['comment']) : ''; ?>
                                </p>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- =============== End testimonial-ratings Section =============== -->


    <!-- =============== Start Video Section =============== -->

    <section class="has-bg-img py-lg">
        <div class="container text-center">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary play-control" data-toggle="modal"
                data-target="#exampleModalCenter" onclick="alert('Not Available Now.')">
                <i class="ti-control-play"></i>
            </button>
            <h6 class="section-title mt-4">Explore our amazing website here.</h6>

        </div>
    </section>
    <!-- =============== Start Video Section =============== -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <iframe width="100%" height="475" src="https://www.youtube.com/embed/TPg_36Bh5yo?si=naPF9YgUf-by-Aw_"
                    frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div> -->
    <!-- end of modal -->

    <!-- =============== End Video Section =============== -->


    <!-- =============== Start Admin Announcements Section =============== -->
    <section id="admin-announcements">
        <div class="container">
            <h6 class="section-subtitle text-center" style="color:white; border-radius: 9px;">Admin Announcements</h6>
            <h6 class="section-title mb-6 text-center" style="color:white; border-radius: 9px;">Latest Announcement</h6>

            <div class="row">
                <div class="col-md-12">
                    <div class="card announcement-post my-4 my-sm-5 my-md-0">
                        <div class="card-body">
                            <div class="details mb-3">
                                <span><i class="ti-user"></i> <span id="adminName">By ADMIN</span></span>
                                <span><i class="ti-calendar"></i> <span id="announcementDate"></span></span>
                            </div>
                            <p id="announcementContent"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    // Fetch the latest admin announcement from the database
    $query = "SELECT a.content, a.posted_at
          FROM announcements a
          ORDER BY a.posted_at DESC
          LIMIT 1";

    try {
        $result = $pdo->query($query);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // Output the data for JavaScript to use
                echo '<script>';
                echo 'document.getElementById("announcementDate").innerText = "' . $row['posted_at'] . '";';
                echo 'document.getElementById("announcementContent").innerHTML = "' . $row['content'] . '";';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'console.error("No announcement found.");';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'console.error("Error executing the query.");';
            echo '</script>';
        }
    } catch (PDOException $e) {
        echo '<script>';
        echo 'console.error("Error: ' . $e->getMessage() . '");';
        echo '</script>';
    }
    ?>

    <!-- =============== End Admin Announcements Section =============== -->


    <!-- =============== Start Contact Section =============== -->
    <section id="contact">
        <div class="container">
            <div class="contact-card">
                <div class="infos">
                    <h6 class="section-subtitle">Get Here</h6>
                    <h6 class="section-title mb-4">Contact Us</h6>

                    <div class="item">
                        <i class="ti-location-pin"></i>
                        <div class="">
                            <h5>Location</h5>
                            <p> Riyadh , SA</p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="ti-mobile"></i>
                        <div>
                            <h5>Phone Number</h5>
                            <p>920000090</p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="ti-email"></i>
                        <div class="mb-0">
                            <h5>Email Address</h5>
                            <p>info@Aleshawiair.com</p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="ti-world"></i>
                        <div class="mb-0">
                            <h5>example.com</h5>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="form">
                    <h6 class="section-subtitle">Available 24/7</h6>
                    <h6 class="section-title mb-4">Get In Touch</h6>
                    <form action="incloudes/process_contact.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" name="email"
                                aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <input placeholder="Subject" name="subject" type="text" class="form-control form-control-lg"
                                required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control form-control-lg"
                                placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg mt-3">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End Contact Section =============== -->


    <!-- =============== Start Footer Section =============== -->

    <section class="has-bg-img py-0">
        <div class="container">
            <div class="footer">
                <div class="footer-lists">
                    <ul class="list">
                        <li class="list-head">
                            <h6 class="font-weight-bold">ABOUT US</h6>
                        </li>
                        <li class="list-body">
                            <a href="index.php" class="logo">
                                <img src="assets/imgs/Riyadh_Air_(Logo).svg.png" style="width:50px;">
                                <h6>Aleshawi Airlines</h6>
                            </a>
                            <p>Aleshawi Air seeks to lead the aviation industry by transforming Saudi Arabia, given its
                                unique strategic location, into a global aviation and trade hub. It is the product of
                                the National Aviation Strategy.</p>
                            <p class="mt-3">
                                Copyright 2024 &copy; <a class="d-inline text-primary"
                                    href="assets/Documents/Copyrights.html" target="_blank">Mohammed Aleshawi</a>
                            </p>
                        </li>
                    </ul>
                    <ul class="list">
                        <li class="list-head">
                            <h6 class="font-weight-bold">USEFUL LINKS</h6>
                        </li>
                        <li class="list-body">
                            <div class="row">
                                <div class="col">
                                    <a href="Flights/flight_search.php">Book a Flight</a>
                                    <a href="#service">Home</a>
                                    <a href="Accessories/FAQs/index.php">FAQs</a>
                                    <a href="Accessories/Currency_Converter/index.html" target='_blank'>Cerrency</a>
                                </div>
                                <div class="col">
                                    <a href="Accessories/weatherapp/index.php" target='_blank'>Weather app</a>
                                    <a href="Accessories/rent/index.php">Car Rental</a>
                                    <a href="Accessories/tourism/index.php">Tourism</a>
                                    <a href="#">Hotel</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list">
                        <li class="list-head">
                            <h6 class="font-weight-bold">CONTACT INFO</h6>
                        </li>
                        <li class="list-body">
                            <h6 class="font-weight-bold">Sebscribe</h6>

                            <div class="cont">
                                <div class="input-group">
                                    <form method="post" action="incloudes/subscribe.php">
                                        <input type="email" class="input" id="Email" name="Email"
                                            placeholder="Email@gmail.com" autocomplete="off">
                                        <input class="button--submit" value="Subscribe" type="submit">

                                </div>

                            </div>

                            <p><i class="ti-location-pin"></i> 920000000 Riyadh , SA</p>
                            <p><i class="ti-email"></i> info@Aleshawiair.com</p>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- =============== End Footer Section =============== -->


    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Creative Studio js -->
    <script src="assets/js/creative-studio.js"></script>

    <!-- JavaScript to handle the redirection -->
    <script>
        document.getElementById('openRatingsPopup').addEventListener('click', function () {
            var ratingsPageUrl = 'Accessories/Ratings/RatingsOut.php';
            // Open a new popup window with the ratings page
            window.open(ratingsPageUrl, 'RatingsPopup', 'width=800,height=600,scrollbars=yes,resizable=yes');
        });
    </script>
</body>

</html>