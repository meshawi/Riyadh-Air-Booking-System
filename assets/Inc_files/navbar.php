<!-- Page Navigation -->
<nav class="navbar custom-navbar navbar-expand-lg navbar-dark" data-spy="affix" data-offset-top="20">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/imgs/Riyadh_Air_Logo.svg.png" style="width:120px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Display login if user is not logged in -->

                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Account_Details_Page/account_details.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio"> Travel Toolkit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Ratings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#admin-announcements"> Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm ml-lg-3" id="logout"
                            href="incloudes/logout.php">logout</a>
                    </li>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN'): ?>
                        <!-- Display dashboard if user is an admin -->
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary btn-sm ml-lg-3" id="dashboard"
                                href="Admin_Dashboard/index.php">Dashboard</a>
                        </li>
                    <?php endif; ?>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Account_Details_Page/account_details.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio"> Travel Toolkit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Ratings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#admin-announcements">Admin Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm ml-lg-3" id="LOGIN" href="Login_Page/login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End Of Page Navigation -->