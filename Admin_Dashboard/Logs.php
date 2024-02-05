<?php
session_start();
include '../incloudes/dbh.inc.php';
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // Redirect to the login page if the user is not logged in
  header("Location: ../Login_Page/login.php");
  exit();
}

function getLogs($pdo, $startTime = null, $endTime = null, $username = null)
{
  $sql = "SELECT * FROM logs WHERE 1";

  $parameters = [];
  if ($startTime) {
    $sql .= " AND timestamp >= :startTime";
    $parameters['startTime'] = $startTime;
  }
  if ($endTime) {
    $sql .= " AND timestamp <= :endTime";
    $parameters['endTime'] = $endTime;
  }
  if ($username) {
    $sql
      .= " AND category = :username";
    $parameters['username'] = $username;
  }
  $stmt = $pdo->prepare($sql);
  $stmt->execute($parameters);
  return $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/framework.css" />
  <link rel="stylesheet" href="css/master.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/Logs.css">



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


    <!-- =============== Start Logs Section =============== -->

    <div class="content w-full">

      <h1 class="p-relative">Logs</h1>
      <div class="courses-page d-grid m-20 gap-20">
        <form action="Logs.php" method="get">
          <label for="startTime">Start Time:</label>
          <input type="datetime-local" id="startTime" name="startTime">

          <label for="endTime">End Time:</label>
          <input type="datetime-local" id="endTime" name="endTime">

          <label for="category">Category:</label>
          <input type="text" id="category" name="category">

          <input type="submit" value="Filter Logs">
        </form>

        <?php
        $startTime = $_GET['startTime'] ?? null;
        $endTime = $_GET['endTime'] ?? null;
        $category = $_GET['category'] ?? null;

        $logs = getLogs($pdo, $startTime, $endTime, $category);

        echo "<table border='1'>";
        echo "<tr><th>Log ID</th><th>Timestamp</th><th>Message</th><th>Category</th></tr>";
        foreach ($logs as $log) {
          echo "<tr><td>{$log['logID']}</td><td>{$log['timestamp']}</td><td>{$log['message']}</td><td>{$log['category']}</td></tr>";
        }
        echo "</table>";

        ?>

      </div><button onclick="window.print()" class="print-btn">Print Logs</button>

    </div>
  </div>
  <!-- =============== End Sidebar Section =============== -->

</body>

</html>