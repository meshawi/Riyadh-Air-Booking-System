<?php
session_start();
include '../../incloudes/dbh.inc.php';

$stmt = $pdo->prepare("
    SELECT r.*, u.Username, u.National_ID, u.profile_image
    FROM ratings r
    JOIN users u ON r.user_id = u.National_ID
    ORDER BY r.created_at DESC
");
$stmt->execute();
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ratings Page</title>
    <!--poppins-font-family-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--using-font-Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="RatingsOut.css">


    <!-- =============== GLOBAL FONT =============== -->
    <link rel="stylesheet" href="../../assets/css/globalFont.css">
</head>

<body>
    <!-- =============== Include navbar  =============== -->

    <?php
    include '../../assets/Inc_files/INC_NAV_forAccessories.php';
    ?>
    <!-- Testimonials -->
    <section id="testimonials">
        <!-- Heading -->
        <div class="testimonial-heading">
            <span>Comments</span>
            <h1>Clients Reviews</h1>
        </div>

        <!-- Testimonials Box Container -->
        <div class="testimonial-box-container">
            <?php foreach ($reviews as $review): ?>
                <div class="testimonial-box">
                    <div class="box-top">
                        <div class="profile">
                            <div class="profile-img">
                                <img src="../../uploads/<?php echo htmlspecialchars($review['profile_image']); ?>"
                                    alt="Profile Image" />
                            </div>

                            <!-- Name and Username -->
                            <div class="name-user">
                                <strong>
                                    <?php echo htmlspecialchars($review['Username']); ?>
                                </strong>
                                <span>@
                                    <?php echo htmlspecialchars($review['National_ID']); ?>
                                </span>
                            </div>
                        </div>
                        <!-- Reviews -->
                        <div class="reviews">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <?php if ($i < $review['rating']): ?>
                                    <i class="fa fa-star"></i>
                                <?php else: ?>
                                    <i class="fa fa-star-o"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <!-- Comments -->
                    <div class="client-comment">
                        <p>
                            <?php echo htmlspecialchars($review['comment']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>


</body>

</html>