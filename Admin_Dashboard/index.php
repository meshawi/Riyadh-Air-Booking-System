<?php
include '../incloudes/dbh.inc.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // Redirect to login page if not logged in
  header("Location: ../Login_Page/login.php");
  exit();
}

$displayName = 'Admin ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];

// Initialize $postedTime
$postedTime = "No recent announcements";

try {
  // Fetch the latest announcement
  $sql = "SELECT posted_at FROM announcements ORDER BY posted_at DESC LIMIT 1";
  $stmt = $pdo->query($sql);

  if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // If there is an announcement, calculate the time 
    $postedTime = time_elapsed_string($row['posted_at']);
  }
} catch (PDOException $e) {
  // Handle exceptions
  echo "Database error: " . $e->getMessage();
}

$nationalId = $_SESSION['user_id'];

try {
  $sql = "SELECT First_Name, Last_Name, Username, user_role, Email, Date_of_Birth FROM users WHERE National_ID = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nationalId]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  $user = array(); // Set an empty array in case of an error
}
$birthdate = $_SESSION['date_of_birth'];

// Calculate the age
$birthTimestamp = strtotime($birthdate);
$currentTimestamp = time();
$ageInSeconds = $currentTimestamp - $birthTimestamp;
$ageInYears = floor($ageInSeconds / (365 * 24 * 3600));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/framework.css" />
  <link rel="stylesheet" href="css/master.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />




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

    <!-- =============== Start Dashbord Section =============== -->

    <div class="content w-full">

      <h1 class="p-relative">Dashboard</h1>
      <div class="wrapper d-grid gap-20">
        <!-- =============== Start Welcome Widget =============== -->
        <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
          <div class="intro p-20 d-flex space-between bg-eee">
            <div>
              <h2 class="m-0">Welcome
                <?php echo htmlspecialchars($_SESSION['first_name']); ?>
              </h2>
              <p class="c-grey mt-5">
                <?php echo htmlspecialchars($_SESSION['username']); ?>
              </p>
            </div>
            <img class="hide-mobile" src="imgs/welcome.png" alt="" />
          </div>
          <img src="imgs/avatar.png" alt="" class="avatar" />
          <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
            <div>
              <?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?>
              <span class="d-block c-grey fs-14 mt-10">
                <?php echo htmlspecialchars($_SESSION['user_role']); ?>
              </span>
            </div>
            <div>
              <?php echo htmlspecialchars($_SESSION['email']); ?>
              <span class="d-block c-grey fs-14 mt-10">Email</span>
            </div>
            <div>
              <?php echo htmlspecialchars($ageInYears . ' Years old'); ?>
              <span class="d-block c-grey fs-14 mt-10">Age</span>
            </div>
          </div>
        </div>

        <!-- =============== End Welcome Widget =============== -->



        <!-- =============== Start Quick Draft Widget =============== -->
        <div class="quick-draft p-20 bg-white rad-10">
          <h2 class="mt-0 mb-10">Quick Draft</h2>
          <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
          <form method="post" action="index_process.php">
            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="title" placeholder="Title" />
            <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="thought"
              placeholder="Your Thought"></textarea>
            <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save" />
          </form>
        </div>
        <!-- =============== End Quick Draft Widget =============== -->


        <!-- =============== Start Announcement  Widget =============== -->
        <div class="latest-post p-20 bg-white rad-10 p-relative">
          <h2 class="mt-0 mb-25">Post Announcement</h2>
          <form action="post_announcement.php" method="post">
            <div class="top d-flex align-center">
              <img class="avatar mr-15" src="imgs/avatar.png" alt="" />
              <div class="info">
                <span class="d-block mb-5 fw-bold">
                  <?php echo htmlspecialchars($displayName); ?>
                </span>
                <?php
                function time_elapsed_string($datetime, $full = false)
                {
                  $now = new DateTime;
                  $ago = new DateTime($datetime);
                  $diff = $now->diff($ago);

                  $diff->w = floor($diff->d / 7);
                  $diff->d -= $diff->w * 7;

                  $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                  );
                  foreach ($string as $k => &$v) {
                    if ($diff->$k) {
                      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                    } else {
                      unset($string[$k]);
                    }
                  }

                  if (!$full)
                    $string = array_slice($string, 0, 1);
                  return $string ? implode(', ', $string) . ' ago' : 'just now';
                }

                ?>
                <span class="c-grey">
                  <?php echo $postedTime; ?>
                </span>
              </div>
            </div>
            <div class="post-content txt-c-mobile pt-20 pb-20 mt-20 mb-20">
              <textarea name="content" rows="4" placeholder="Enter your announcement here..."
                class="d-block mb-20 w-full p-10 b-none bg-eee rad-6"></textarea>
            </div>
            <input type="submit" value="Post Announcement"
              class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape">
          </form>
        </div>
        <!-- =============== End Announcement  Widget =============== -->


        <!-- =============== Start Ticket  Widget =============== -->
        <div class="tickets p-20 bg-white rad-10">
          <h2 class="mt-0 mb-10">Tickets Statistics</h2>
          <p class="mt-0 mb-20 c-grey fs-15">Everything About Booking Tickets</p>
          <div class="d-flex txt-c gap-20 f-wrap">
            <div class="box p-20 rad-10 fs-13 c-grey">
              <?php
              try {
                // Prepare the SQL query to count the number of bookings
                $sql = "SELECT COUNT(*) FROM bookings";
                $stmt = $pdo->query($sql);

                // Execute the query and fetch the result
                $numberOfBookings = $stmt->fetchColumn();

              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              }
              ?>

              <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5">
                <?php echo $numberOfBookings; ?>
              </span>
              Total
            </div>
            <?php
            try {
              // SQL to count the number of bookings with status "Waiting for Payment"
              $sql = "SELECT COUNT(*) FROM bookings WHERE status = 'Waiting for Payment'";
              $stmt = $pdo->query($sql);
              $numberOfPendingBookings = $stmt->fetchColumn();
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage(); // Handle the error appropriately
            }
            ?>

            <div class="box p-20 rad-10 fs-13 c-grey">
              <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5">
                <?php echo $numberOfPendingBookings; ?>
              </span>
              Waiting for Payment
            </div>
            <?php
            try {
              // SQL query to count the number of bookings with status "Paid"
              $sql = "SELECT COUNT(*) FROM bookings WHERE status = 'Paid'";
              $stmt = $pdo->query($sql);
              $numberOfPaidBookings = $stmt->fetchColumn();
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage(); // Handle any error appropriately
            }
            ?>

            <div class="box p-20 rad-10 fs-13 c-grey">
              <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5">
                <?php echo $numberOfPaidBookings; ?>
              </span>
              Paid
            </div>

            <?php
            try {
              // SQL query to count the number of bookings with status "Canceled"
              $sql = "SELECT COUNT(*) FROM bookings WHERE status = 'Canceled'";
              $stmt = $pdo->query($sql);
              $numberOfCanceledBookings = $stmt->fetchColumn();
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage(); // Handle any error appropriately
            }
            ?>

            <div class="box p-20 rad-10 fs-13 c-grey">
              <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
              <span class="d-block c-black fw-bold fs-25 mb-5">
                <?php echo $numberOfCanceledBookings; ?>
              </span>
              Canceled
            </div>

          </div>
        </div>
        <!-- =============== End Ticket  Widget =============== -->


        <!-- =============== Start Top booked city  Widget =============== -->

        <?php
        // Function to get the most booked destination cities
        function getMostBookedDestinations($pdo)
        {
          $sql = "SELECT c.cityName, COUNT(b.flightID) as bookingCount
            FROM bookings b
            INNER JOIN flights f ON b.flightID = f.FlightID
            INNER JOIN cities c ON f.destinationCityID = c.cityID
            GROUP BY f.destinationCityID
            ORDER BY bookingCount DESC
            LIMIT 5"; // Adjust the LIMIT as needed
        
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $mostBookedDestinations = getMostBookedDestinations($pdo);

        ?>


        <div class="search-items p-20 bg-white rad-10">
          <h2 class="mt-0 mb-20">Top Booked Destinations</h2>
          <div class="items-head d-flex space-between c-grey mb-10">
            <div>Destination City</div>
            <div>Booking Count</div>
          </div>
          <?php foreach ($mostBookedDestinations as $destination): ?>
            <div class="items d-flex space-between pt-15 pb-15">
              <span>
                <?php echo htmlspecialchars($destination['cityName']); ?>
              </span>
              <span class="bg-eee fs-13 btn-shape">
                <?php echo htmlspecialchars($destination['bookingCount']); ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- =============== End Top booked city  Widget =============== -->



        <!-- =============== Start Latest Announcements  Widget =============== -->
        <div class="reminders p-20 bg-white rad-10 p-relative">
          <h2 class="mt-0 mb-25">Latest Announcements</h2>
          <ul class="m-0">
            <?php


            // Prepare and execute the query
            $stmt = $pdo->prepare("SELECT * FROM announcements ORDER BY posted_at DESC LIMIT 5");
            $stmt->execute();
            $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($announcements as $announcement) {
              $content = $announcement['content']; // Announcement content
              $postedAt = $announcement['posted_at']; // Posted date
              $formattedDate = date("d/m/Y - h:ia", strtotime($postedAt)); // Format the date
            
              echo "<li class='d-flex align-center mt-15'>";
              echo "<span class='key bg-blue mr-15 d-block rad-half'></span>"; // Icon or color key
              echo "<div class='pl-15 blue'>";
              echo "<p class='fs-14 fw-bold mt-0 mb-5'>" . htmlspecialchars($content) . "</p>";
              echo "<span class='fs-13 c-grey'>" . $formattedDate . "</span>";
              echo "</div>";
              echo "</li>";
            }
            ?>
          </ul>
        </div>
        <!-- =============== End Latest Announcements  Widget =============== -->


        <!-- =============== Start Drafts   Widget =============== -->

        <div class="drafts p-20 bg-white rad-10">
          <h2 class="mt-0 mb-20">Latest Drafts</h2>
          <?php
          $sql = "SELECT draftId, title, thought FROM drafts ORDER BY created_at DESC";
          $stmt = $pdo->query($sql);

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="draft-row between-flex" data-draft-id="<?php echo $row['draftId']; ?>">
              <div class="info">
                <h3 class="mt-0 mb-5 fs-15">
                  <?php echo htmlspecialchars($row['title']); ?>
                </h3>
                <p class="m-0 c-grey">
                  <?php echo htmlspecialchars($row['thought']); ?>
                </p>
              </div>
              <form method="post" action="delete_draft.php">
                <input type="hidden" name="id" value="<?php echo $row['draftId']; ?>">
                <button type="submit" class="fa-regular fa-trash-can delete"></button>
              </form>
            </div>
            <?php
          }
          ?>
        </div>

        <!-- =============== End Drafts   Widget =============== -->


        <!-- =============== Start Email sending Widget =============== -->
        <div class="quick-draft p-20 bg-white rad-10">
          <h2 class="mt-0 mb-10">Send Notifcation email Daft</h2>
          <p class="mt-0 mb-20 c-grey fs-15">Write A email For Your Ideas</p>
          <form action="send_emails.php" method="post">
            <label for="messageInput">Enter Message:</label>
            <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" id="messageInput" name="message" rows="4"
              required></textarea>

            <button type="submit">Send Email</button>
          </form>
          <div id="response">
            <?php
            if (isset($_GET['status'])) {
              echo htmlspecialchars($_GET['status']);
            }
            ?>
          </div>
        </div>
        <!-- =============== End Email sending Widget =============== -->


        <!-- =============== Start Projects Table Widget =============== -->

      </div>
      <div class="projects p-20 bg-white rad-10 m-20">
        <h2 class="mt-0 mb-20">Development Team</h2>
        <div class="responsive-table">
          <table class="fs-15 w-full">
            <thead>
              <tr>
                <td>Name</td>
                <td>Roles</td>
                <td>Codeing Percentage</td>
                <td>Codeing Langugause</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mohammed ALeshawi</td>
                <td>Back and Front End , Team Leader , Project Manager , DB Devoloper</td>
                <td>70 Precent</td>
                <td>
                  <img src="imgs/logo (2).png" alt="" />
                  <img src="imgs/logo (3).png" alt="" />
                  <img src="imgs/logo (1).png" alt="" />
                  <img src="imgs/logo (4).png" alt="" />
                </td>
                <td>
                  <span class="label btn-shape bg-orange c-white">Pending</span>
                </td>
              </tr>
              <tr>
                <td>Yazeed</td>
                <td>Front end Devoloper</td>
                <td>20 Precent</td>
                <td>
                  <img src="imgs/logo (3).png" alt="" />
                  <img src="imgs/logo (1).png" alt="" />
                  <img src="imgs/logo (4).png" alt="" />
                </td>
                <td><span class="label btn-shape bg-blue c-white">In Progress</span></td>
              </tr>
              <tr>
                <td>Sultan</td>
                <td>Front end Devoloper</td>
                <td>20 Precent</td>
                <td>
                  <img src="imgs/logo (3).png" alt="" />
                  <img src="imgs/logo (1).png" alt="" />
                  <img src="imgs/logo (4).png" alt="" />
                </td>
                <td><span class="label btn-shape bg-green c-white">Completed</span></td>
              </tr>
              <tr>
                <td>Riyadh</td>
                <td>Front end Devoloper, internal audit, documenting </td>
                <td>10 Precent</td>
                <td>
                  <img src="imgs/logo (3).png" alt="" />
                  <img src="imgs/logo (1).png" alt="" />
                  <img src="imgs/logo (4).png" alt="" />
                </td>
                <td><span class="label btn-shape bg-green c-white">Completed</span></td>
              </tr>
              <tr>
                <td>Sauod</td>
                <td>documenting, assistance in presentation </td>
                <td>0 Precent</td>
                <td>
                  <img src="imgs/team-01.png" alt="" />

                </td>
                <td><span class="label btn-shape bg-red c-white">Rejected</span></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <!-- =============== End Projects Table Widget =============== -->
    </div>
  </div>



</body>

</html>