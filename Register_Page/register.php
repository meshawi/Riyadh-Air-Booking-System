<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="register.css" />

    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../assets/css/globalFont.css">

    <title>User Registration Page</title>
</head>

<body>
    <div id="container" class="container sign-up">
        <div class="row content-row">


            <!-- =============== Start Sign-up  Section =============== -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <form action="../incloudes/signup_process.php" method="post">
                            <div class="input-group">
                                <i class="bx bxs-user"></i>
                                <input type="text" name="nID" id="nID" placeholder="National ID" />
                                <span id="nIDError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bxs-user"></i>
                                <input type="text" name="username" id="username" placeholder="Username" />
                                <span id="usernameError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bxs-lock-alt"></i>
                                <input type="password" name="psw" id="psw" placeholder="Password" />
                                <span id="pswError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bxs-user"></i>
                                <input type="text" name="fName" id="fName" placeholder="First name" />
                                <span id="fNameError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bxs-user"></i>
                                <input type="text" name="lName" id="lName" placeholder="Last name" />
                                <span id="lNameError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bx-mail-send"></i>
                                <input type="email" name="email" id="email" placeholder="Email" />
                                <span id="emailError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bxs-phone"></i>
                                <input type="text" name="pNumber" id="pNumber"
                                    placeholder="Phone number ( start with 5 )" />
                                <span id="pNumberError" class="error-message"></span>

                            </div>
                            <div class="input-group">
                                <i class="bx bxs-calendar"></i>
                                <input type="date" name="DoP" id="DoP" placeholder="Date of Birth" />
                                <span id="DoPError" class="error-message"></span>

                            </div>
                            <div class="input-group checkbox-group">
                                <input type="checkbox" name="agreeCheckbox" id="agreeCheckbox" required>
                                <label for="agreeCheckbox">I agree to the <a href="../assets/Documents/disclaimer.html"
                                        target="_blank" id="downloadDisclaimerLink">terms
                                        and conditions</a></label>
                            </div>
                            <button type="submit">Sign up</button>
                        </form>
                        <!-- Button to redirect to login page -->
                        <br><button id="loginPage">Login</button><br><br>

                        <!-- Button to redirect to home page (index.php) -->
                        <button id="homePage">Home</button><br><br>
                    </div>

                </div>
            </div>
            <!-- Sign-up Content Section -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">
                    <img src="../assets/imgs/Riyadh_Air_Logo.svg white.png" alt="welcome" />
                </div>
                <div class="text sign-up">
                    <h2>Join with us</h2>
                    <p>
                        Ready for a unique adventure? Riyadh Airplane is your ticket to
                        extraordinary journeys. Join us now and let's soar together!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- =============== End Sign-up  Section =============== -->

    <script src="register.js"></script>
</body>

</html>