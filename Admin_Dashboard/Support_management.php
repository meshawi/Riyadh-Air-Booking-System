<?php
session_start();
include '../incloudes/dbh.inc.php';

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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Projects</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/framework.css" />
  <link rel="stylesheet" href="css/master.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="css/Support_management.css">


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


    <!-- =============== Start Suooort Section =============== -->

    <div class="content w-full">

      <h1 class="p-relative">Support</h1>




      <!-- View users ratings -->
      <div class="container" id="testimonials">

        <?php
        $stmt = $pdo->prepare("
SELECT r.*, u.Username, u.National_ID, u.profile_image
FROM ratings r
JOIN users u ON r.user_id = u.National_ID
ORDER BY r.created_at DESC
");
        $stmt->execute();
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <div class="testimonial-box-container">
          <h1>What Our Users Say</h1>
          <div></div>
          <?php foreach ($reviews as $review): ?>
            <div class="testimonial-box">
              <!-- Top -->
              <div class="box-top">
                <!-- Profile -->
                <div class="profile">
                  <!-- Placeholder Image -->
                  <div class="profile-img">
                    <img src="../uploads/<?php echo htmlspecialchars($review['profile_image']); ?>" />
                    <!-- Update or replace as needed -->
                  </div>

                  <!-- Name and Username -->
                  <div class="name-user">
                    <strong>
                      <?php echo htmlspecialchars($review['Username']); ?>
                    </strong>
                    <span>@
                      <?php echo htmlspecialchars($review['National_ID']); ?>
                    </span>
                  </div>
                </div>
                <!-- Reviews -->
                <div class="reviews">
                  <?php for ($i = 0; $i < 5; $i++): ?>
                    <?php if ($i < $review['rating']): ?>
                      <i class="fa fa-star"></i>
                    <?php else: ?>
                      <i class="fa fa-star-o"></i>
                    <?php endif; ?>
                  <?php endfor; ?>
                </div>
              </div>
              <!-- Comments -->
              <div class="client-comment">
                <p>
                  <?php echo htmlspecialchars($review['comment']); ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- View Contact Us -->
        <div class="container">
          <h1>Contact Us Submissions</h1>
          <?php
          $stmt = $pdo->query("SELECT * FROM contact_submissions ORDER BY submitted_at DESC");
          while ($submission = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='submission-container'>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($submission['submitted_at']) . "</p>";
            echo "<p><strong>Subject:</strong> " . htmlspecialchars($submission['subject']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($submission['email']) . "</p>";
            echo "<p><strong>Message:</strong> " . nl2br(htmlspecialchars($submission['message'])) . "</p>";
            echo "</div>";
          }
          ?>
        </div>



      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- =============== End Suooort Section =============== -->

</body>

</html>