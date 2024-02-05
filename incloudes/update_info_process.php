<?php
session_start();
include 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
    $username = $_POST['Username'];
    $password = $_POST['pwd'];
    $fName = $_POST['First_Name'];
    $lName = $_POST['Last_Name'];
    $email = $_POST['Email'];
    $pNumber = $_POST['Phone_number'];
    $DoB = $_POST['Date_of_Birth'];

    // Initialize the profile image path variable
    $profileImagePath = null;

    // Check if a file is uploaded
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        // Handle the uploaded file
        $fileTmpName = $_FILES['profile_image']['tmp_name'];
        $fileType = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
        $newFileName = "profile_" . $userID . "." . $fileType; // Create a unique name for the file
        $fileDestination = '../uploads/' . $newFileName;

        // Load the image
        switch ($fileType) {
            case 'jpg':
            case 'jpeg':
                $originalImage = imagecreatefromjpeg($fileTmpName);
                break;
            case 'png':
                $originalImage = imagecreatefrompng($fileTmpName);
                break;
            case 'gif':
                $originalImage = imagecreatefromgif($fileTmpName);
                break;
            default:
                $originalImage = false;
                error_log("Unsupported image type: " . $fileType);
                break;
        }

        if (!$originalImage) {
            error_log("Failed to create image resource.");
        } else {
            // Create a new true color image with 100x100
            $newImage = imagecreatetruecolor(100, 100);

            // Preserve transparency for PNG and GIF files
            if ($fileType === 'png' || $fileType === 'gif') {
                // Set the flag to save full alpha channel information
                imagesavealpha($newImage, true);
                // Turn off transparency blending (temporarily)
                imagealphablending($newImage, false);
                // Create a new transparent color for the image
                $transparent = imagecolorallocatealpha($newImage, 0, 0, 0, 127);
                // Fill the image with transparent color
                imagefill($newImage, 0, 0, $transparent);
                // Turn on transparency blending again for PNGs
                if ($fileType === 'png') {
                    imagealphablending($newImage, true);
                }
            }

            // Copy and resize the uploaded image to the new true color image
            imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, 100, 100, imagesx($originalImage), imagesy($originalImage));

            // Save the resized image to the destination
            switch ($fileType) {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($newImage, $fileDestination, 100);
                    break;
                case 'png':
                    imagepng($newImage, $fileDestination, 9);
                    break;
                case 'gif':
                    imagegif($newImage, $fileDestination);
                    break;
            }

            // Free up memory
            imagedestroy($originalImage);
            imagedestroy($newImage);

            // Update profile image path if the resize and save were successful
            $profileImagePath = $fileDestination;
        }
    }

    // Prepare the SQL update statement
    $sql = "UPDATE users SET Username = ?, pwd = IF(LENGTH(?)=0, pwd, ?), First_Name = ?, Last_Name = ?, Email = ?, Phone_number = ?, Date_of_Birth = ?" . ($profileImagePath ? ", profile_image = ?" : "") . " WHERE National_ID = ?";
    $stmt = $pdo->prepare($sql);

    // Hash the password if it is not empty
    $hashedPassword = $password ? password_hash($password, PASSWORD_BCRYPT) : $password;

    $parameters = [$username, $password, $hashedPassword, $fName, $lName, $email, $pNumber, $DoB];
    if ($profileImagePath) {
        $parameters[] = $profileImagePath;
    }
    $parameters[] = $userID;

    $stmt->execute($parameters);

    // Redirect back to the account details page
    header("Location: ../Account_Details_Page/account_details.php");
    exit;
} else {
    // Redirect to login page if not a POST request or if not logged in
    header("Location: ../Login_Page/login.php");
    exit;
}
?>
