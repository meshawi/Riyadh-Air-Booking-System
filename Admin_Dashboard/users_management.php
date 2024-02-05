<?php
session_start();
include '../incloudes/dbh.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../Login_Page/login.php");
    exit();
}

// Fetch all users for display
$stmt = $pdo->query("SELECT * FROM users");
$_SESSION['users'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link href="css/users_management.css" rel="stylesheet" />



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

        <!-- =============== Start users_management Section =============== -->
        <div class="content w-full">

        <h1 class="p-relative">Users</h1>
        <div class="profile-page m-20">



            <!-- Start Overview -->
            <div class="content w-full">
                <div class="content w-full">

                    <!-- Display message if any -->
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<p>" . $_SESSION['message'] . "</p>";
                        unset($_SESSION['message']);
                    }
                    ?>

                    <!-- Viewing Users Section -->
                    <section class="user-view">
                        <h2>View Users</h2>
                        <div class="user-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>National ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Date of Birth</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($_SESSION['users'])) {
                                        foreach ($_SESSION['users'] as $row) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['National_ID']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Username']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['pwd']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['First_Name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Last_Name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Phone_number']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Date_of_Birth']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['user_role']) . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </section>

                    <!-- Editing / Deleting Users Section -->
                    <section class="user-edit-delete">
                        <h2>Edit/Delete User</h2>
                        <form method="post" action="users_management_process.php">
                            Enter National ID: <input type="text" name="national_id" required>
                            <input type="submit" name="fetch_user" value="Fetch User">
                        </form>

                        <?php if (isset($_SESSION['userToEdit']) && !empty($_SESSION['userToEdit'])): ?>
                            <form method="post" action="users_management_process.php">
                                <!-- Form fields in rows -->
                                <div class="form-row">
                                    <div class="form-field">
                                        National ID: <input type="text" name="national_id"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['National_ID']); ?>"
                                            readonly>
                                    </div>
                                    <div class="form-field">
                                        Username: <input type="text" name="username"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['Username']); ?>">
                                    </div>
                                    <div class="form-field">
                                        Password: <input type="text" name="pwd"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['pwd']); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        First Name: <input type="text" name="First_Name"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['First_Name']); ?>">
                                    </div>
                                    <div class="form-field">
                                        Last Name: <input type="text" name="Last_Name"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['Last_Name']); ?>">
                                    </div>
                                    <div class="form-field">
                                        Email: <input type="email" name="email"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['Email']); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        Phone Number: <input type="text" name="Phone_number"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['Phone_number']); ?>">
                                    </div>
                                    <div class="form-field">
                                        Date of Birth: <input type="date" name="Date_of_Birth"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['Date_of_Birth']); ?>">
                                    </div>
                                    <div class="form-field">
                                        Role: <input type="text" name="user_role"
                                            value="<?php echo htmlspecialchars($_SESSION['userToEdit']['user_role']); ?>">
                                    </div>
                                </div>
                                <input type="submit" name="update_user" value="Save Changes"><br><br>
                                <input type="submit" name="delete_user" value="Delete User">
                            </form>
                        <?php else: ?>
                            <!-- display a message when no user data is available -->
                            <p>Enter a National ID and click 'Fetch User' to edit or delete user information.</p>
                        <?php endif; ?>
                    </section>

                    <!-- Add New User Section -->
                    <section class="user-add">
                        <h2>Add New User</h2>
                        <form method="post" action="users_management_process.php">
                            <div class="form-row">
                                <div class="form-field">
                                    <input type="text" name="National_ID" placeholder="National ID" required>
                                </div>
                                <div class="form-field">
                                    <input type="text" name="Username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-field">
                                    <input type="password" name="Password" placeholder="Password" required>
                                </div>
                                <div class="form-field">
                                    <input type="email" name="Email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-field">
                                    <input type="text" name="First_Name" placeholder="First Name" required>
                                </div>
                                <div class="form-field">
                                    <input type="text" name="Last_Name" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-field">
                                    <input type="text" name="Phone_number" placeholder="Phone Number" required>
                                </div>
                                <div class="form-field">
                                    <input type="date" name="Date_of_Birth" placeholder="Date of Birth" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-field">
                                    <select name="user_role">
                                        <option value="normal_user">Normal User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" name="add_user" value="Add User">
                        </form>
                    </section>


                </div>
            </div>
            <!-- =============== End users_management Section =============== -->


</body>
</html>