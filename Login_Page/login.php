<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="login.css">

  <!-- =============== GLOBAL FONT =============== -->
  <link rel="stylesheet" href="../assets/css/globalFont.css">
</head>

<body>


  <!-- =============== Start Login Section =============== -->

  <div id="container" class="container sign-in">
    <div class="row">

      <div class="col align-items-center flex-col">
        <div class="img sign-in">
                    <img src="../assets/imgs/Riyadh_Air_Logo.svg white.png" alt="welcome" style="max-width: 400px;"/>
        </div>
        <div class="text sign-in">
          <h2>Join with us</h2>
          <p>
            The city that is already transforming the way we live is now redefining the way we fly. <br>Welcome to
            Aleshawi Air, a brand-new chapter in the sky.
          </p>
        </div>
      </div>

      <!-- SIGN IN FORM -->
      <div class="col align-items-center flex-col sign-in">
        <div class="form-wrapper align-items-center">
          <div class="form sign-in">
            <form action="../incloudes/login_process.php" method="post">
              <!-- Username Input -->
              <div class="input-group">
                <i class="bx bxs-user"></i>
                <input type="text" id="username" name="username" placeholder="Username">
                <span id="usernameError" class="error-message"></span>

              </div>
              <!-- Password Input -->
              <div class="input-group">
                <i class="bx bxs-lock-alt"></i>
                <input type="password" id="password" name="password" placeholder="Password">
                <span id="passwordError" class="error-message"></span>
              </div>
              <span id="generalError" class="error-message"></span>
              <!-- Login Button -->
              <button type="submit">Sign in</button><br>
            </form>
            <!-- Button to redirect to signup page -->
            <br><button id="signupPage">Sign Up</button><br>
            <!-- Button to redirect to home page (index.php) -->
            <br><button id="homePage">Home</button><br>
          </div>
        </div>
      </div>

    </div>
    <!-- Redirect Buttons -->
    <div class="redirect-buttons">
      <button id="signupPage">Sign Up</button>
      <button id="homePage">Home</button>
    </div>
  </div>
  <!-- =============== End Login Section =============== -->

  <script src="login.js"></script>
</body>

</html>