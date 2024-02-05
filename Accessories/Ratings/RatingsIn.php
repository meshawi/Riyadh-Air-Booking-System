<?php
session_start();
include '../../incloudes/dbh.inc.php'; // Adjust the path as necessary
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RatingsIn.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Ratings Page</title>
    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../../assets/css/globalFont.css">
</head>

<body>

    <div class="wrapper">

        <h3>Rate our services.</h3>
        <form action="../../incloudes/ratings_process.php" method="post">
            <div class="rating">
                <input type="number" name="rating" hidden>
                <i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
            <textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..." required></textarea>
            <div class="btn-group">
                <button type="submit" class="btn submit">Submit</button>
                <button class="btn cancel">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        const allStar = document.querySelectorAll('.rating .star');
        const ratingValue = document.querySelector('.rating input');
        const cancelButton = document.querySelector('.btn.cancel');

        allStar.forEach((item, idx) => {
            item.addEventListener('click', function () {
                let click = 0;
                ratingValue.value = idx + 1;

                allStar.forEach(i => {
                    i.classList.replace('bx-star', 'bx-star');
                    i.classList.remove('active');
                });

                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace('bx-star', 'bxs-star');
                        allStar[i].classList.add('active');
                    } else {
                        allStar[i].style.setProperty('--i', click);
                        click++;
                    }
                }
            });
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default form submission
            // Clear the form
            document.querySelector('form').reset();
            // Reset stars
            allStar.forEach(star => {
                star.classList.replace('bxs-star', 'bx-star');
                star.classList.remove('active');
            });
        });
    </script>
</body>

</html>