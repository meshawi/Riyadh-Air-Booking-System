<!--DOCTYPE html-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title===========================-->
    <title>FAQs HTML CSS</title>
    <!--==CSS=============================-->
    <link rel="stylesheet" href="style.css">
    <!--==poppins-font====================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../../assets/css/globalFont.css">

</head>

<body>
    <!-- =============== Include navbar  =============== -->

    <?php
    include '../../assets/Inc_files/INC_NAV_forAccessories.php';
    ?>

    <section id="faq">

        <!-- Heading -->
        <div class="faq-heading">
            <h3>FAQ</h3>
            <p>Here are <strong>several frequently asked</strong>, that may answer <strong>your questions</strong>
        </div>

        <!-- Container -->
        <div class="faq-content">
            <!-- faq -->
            <div class="faq-box-container">

                <div class="faq-box">
                    <div class="faq-box-question active">
                        <h4>What is the time limit for domestic flights?</h4>
                        <span class="faq-box-icon"></span>
                    </div>
                    <div class="faq-box-answer" style="max-height: 100px;">
                        <p>Two hours from the moment you create the booking.</p>
                    </div>
                </div>

                <div class="faq-box">
                    <div class="faq-box-question">
                        <h4>If I entered the passengers name incorrect, what should I do?</h4>
                        <span class="faq-box-icon"></span>
                    </div>
                    <div class="faq-box-answer">
                        <p>You should visit Riyadhair ticketing office or calling the telephone sales centers.</p>
                    </div>
                </div>

                <div class="faq-box">
                    <div class="faq-box-question">
                        <h4>I am in KSA and wish to pay the ticket fare, what are the forms of payment available?</h4>
                        <span class="faq-box-icon"></span>
                    </div>
                    <div class="faq-box-answer">
                        <p>Available forms of payment are SADAD ,MADA, VISA, Master Card and American express.</p>
                    </div>
                </div>


                <div class="faq-box">
                    <div class="faq-box-question">
                        <h4>What is a booking reference?</h4>
                        <span class="faq-box-icon"></span>
                    </div>
                    <div class="faq-box-answer">
                        <p>It is the identification number for your booking which consists of 6 letters or 12 numbers,
                            it has one or more segments including the name(s) of the passenger(s), contact information
                            and ticket number(s).</p>
                    </div>
                </div>

                <div class="faq-box">
                    <div class="faq-box-question">
                        <h4>How do i book my flights?</h4>
                        <span class="faq-box-icon"></span>
                    </div>
                    <div class="faq-box-answer">
                        <p>On the home page, You will find a list of the destinations that Riyadhair and its partners
                            fly to where all you need to do is to choose a departure and arrival destinations.</p>
                    </div>
                </div>

            </div>

        </div>

    </section>



    <script>
        var faq = document.getElementsByClassName("faq-box-question");
        var i;
        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function () {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");
                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.maxHeight === "100px") {
                    body.style.maxHeight = "0px";
                } else {
                    body.style.maxHeight = "100px";
                }
            });
        }
    </script>


</body>

</html>