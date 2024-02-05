<style>
  .navigationWrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px;
    margin-bottom: 20px;
    background-color: #222;
    box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.25);
    color: white;
    text-transform: uppercase;
    overflow: hidden;

    .logoWrapper {
      display: flex;

      .stylish {
        font-weight: bold;
      }

      .logo {
        padding-left: 4px;
        color: #ea4f4c;
      }
    }

    .navigation {
      display: flex;
      list-style-type: none;

      li {
        opacity: 1;
        list-style-type: none;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
      }

      .parent {
        padding: 0 10px;
        cursor: pointer;

        .link {
          position: relative;
          display: flex;
          align-items: center;
          text-decoration: none;
          transition: all 0.3s ease-in-out;
          color: white;

          &:hover {
            color: #ea4f4c;
          }

          .fa-minus {
            opacity: 0;
            transition: all 0.3s ease-in-out;
            position: absolute;
            left: -16px;
            top: 3px;
          }

          .fa-plus {
            opacity: 1;
            transition: all 0.3s ease-in-out;
          }

          .fas {
            color: #ea4f4c;
            margin: -2px 4px 0;
            font-size: 10px;
            transition: all 0.3s ease-in-out;
          }
        }
      }

      .subnavigation {
        display: none;
        list-style-type: none;
        width: 700px;
        position: absolute;
        top: 40%;
        left: 25%;
        margin: auto;
        transition: all 0.3s ease-in-out;
        background-color: #222;

        li a {
          font-size: 17px;
          padding: 0 5px;
        }
      }
    }
  }

  .active.parent {
    transform: translate(-40px, -25px);

    .link {
      font-size: 12px;

      .fa-minus {
        opacity: 1 !important;
        font-size: 8px;
      }

      .fa-plus {
        opacity: 0 !important;
      }
    }

    .subnavigation {
      display: flex;
    }
  }

  .active#clients {
    .subnavigation {
      transform: translate(-150px, 17px);
    }
  }

  .active#services {
    .subnavigation {
      transform: translate(-290px, 17px);
    }
  }

  .invisible {
    opacity: 0 !important;
    transform: translate(50px, 0);
  }

  span {
    font-size: 20px
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<nav class="navigationWrapper">
  <div class="logoWrapper">
    <span class="stylish">Riyadh</span>
    <span class="logo">Airlines</span>
  </div>
  <ul class="navigation">
    <li class="parent"><a class="link" href="../index.php">Home</a></li>
    <li class="parent"><a class="link" href="../Account_Details_Page/account_details.php">Profile</a></li>
    <li class="parent"><a class="link" href="../Flights/flight_search.php">Booking</a></li>
    <li class="parent" id="clients">
      <a class="link" href="#"><i class="fas fa-minus"></i> other <i class="fas fa-plus"></i></a>
      <ul class="subnavigation">
        <li><a class="link" href="../Accessories/Currency_Converter/index.html"
            onclick="openPopup('../Accessories/Currency_Converter/index.html'); return false;">Currency Converter</a>
        </li>
        <li><a class="link" href="../Accessories/FAQs/index.php" target="_blank">FAQs</a></li>
        <li><a class="link" href="../Accessories/Ratings/RatingsOut.php" target="_blank">Ratings</a></li>
      </ul>
    </li>
    <li class="parent" id="services">
      <a class="link" href="#"><i class="fas fa-minus"></i> Services <i class="fas fa-plus"></i></a>
      <ul class="subnavigation">
        <li><a class="link" href="../Accessories/tourism/index.php">Tourism</a></li>
        <li><a class="link" href="../Accessories/tourism/festivals.php">Festivals</a></li>
        <li><a class="link" href="../Accessories/hotels/index.php" target="_blank">hotels</a></li>
        <li><a class="link" href="../Accessories/rent/index.php" target="_blank">Car Rental</a></li>
        <li><a class="link" href="../Accessories/weatherapp/index.php"
            onclick="openPopup('../Accessories/weatherapp/index.php'); return false;">Weather app</a></li>
      </ul>
    </li>
    <li class="parent"><a class="link" href="../incloudes/logout.php">Logout</a></li>
    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN'): ?>

      <!-- Display dashboard if user is an admin -->
      <li class="parent">
        <a class="link" id="dashboard" href="../Admin_Dashboard/index.php">Dashboard</a>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  var clients = document.getElementById('clients');
  var services = document.getElementById('services');

  clients.addEventListener('click', function () {
    $(clients).toggleClass("active");
    $(".parent:not(#clients)").toggleClass("invisible");
  }, false);

  services.addEventListener('click', function () {
    $(services).toggleClass("active");
    $(".parent:not(#services)").toggleClass("invisible");
  }, false);
  function openPopup(url) {
    window.open(url, '_blank', 'width=600, height=400');
  }
</script>