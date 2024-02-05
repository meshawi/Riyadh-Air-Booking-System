<!-- Page Header -->
<header class="header">
    <div class="overlay">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Display personalized welcome message for logged-in users -->
            <?php echo "<h5> Welcome " . htmlspecialchars($username) . " to </h5>"; ?>
        <?php else: ?>
            <!-- Display generic welcome message for non-logged-in users -->
            <h5> Welcome to</h5>
        <?php endif; ?>

        <h1 class="title">Riyadh Airlines</h1>
        <div class="buttons text-center">
            <a href="Flights/flight_search.php" class="btn btn-primary rounded w-lg btn-lg my-1">Book a Flight</a>
            <a href="#contact" class="btn btn-outline-light rounded w-lg btn-lg my-1">Contact Us</a>
        </div>
    </div>
</header>