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
  <title>Files</title>
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


    <!-- =============== Start Files Section =============== -->

    <div class="content w-full">

      <h1 class="p-relative">Files</h1>
      <div class="files-page d-flex m-20 gap-20">

        <div class="files-content d-grid gap-20">
          <?php
          $directoryPath = '../Filesuploads/';
          if (is_dir($directoryPath)) {
            $files = array_diff(scandir($directoryPath), array('..', '.'));

            foreach ($files as $file) {
              $filePath = $directoryPath . $file;
              $fileSize = filesize($filePath);
              $fileDate = date("d/m/Y", filemtime($filePath));
              $fileSizeFormatted = number_format($fileSize / 1048576, 2) . 'MB';

              $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
              $iconPath = ""; // default icon path
              switch ($fileExtension) {
                case "pdf":
                  $iconPath = "imgs/pdf.svg";
                  break;
                case "jpg":
                case "jpeg":
                  $iconPath = "imgs/jpg.svg";
                  break;
                case "png":
                  $iconPath = "imgs/png.svg";
                  break;
                case "doc":
                case "docx":
                  $iconPath = "imgs/docx.svg";
                  break;
                case "xlsx":
                  $iconPath = "imgs/xlsx.svg";
                  break;
                case "txt":
                  $iconPath = "imgs/txt.svg";
                case "avi":
                  $iconPath = "imgs/avi.svg";
                  break;
                case "sql":
                  $iconPath = "imgs/sql.svg";
                  break;
                case "pptx":
                  $iconPath = "imgs/pptx.svg";
                  break;
              }
              ?>
              <div class="file bg-white p-10 rad-10">
                <i class="fa-solid fa-download c-grey p-absolute"></i>
                <div class="icon txt-c">
                  <?php if ($iconPath != ""): ?>
                    <img class="mt-15 mb-15" src="<?php echo $iconPath; ?>" alt="" />
                  <?php endif; ?>
                </div>
                <div class="txt-c mb-10 fs-14">
                  <?php echo $file; ?>
                </div>
                <p class="c-grey fs-13">ADMIN</p>
                <div class="info between-flex mt-10 pt-10 fs-13 c-grey">
                  <span>
                    <?php echo $fileDate; ?>
                  </span>
                  <span>
                    <?php echo $fileSizeFormatted; ?>
                  </span>
                </div>
                <a href="<?php echo $filePath; ?>" download>Download</a>
              </div>
              <?php
            }
          } else {
            echo "Directory not found.";
          }
          ?>

        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- =============== End Files Section =============== -->

</body>

</html>