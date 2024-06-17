<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

    <style>
        .review-box {
            border: var(--border);
            padding: 2rem;
            text-align: center;
            height: 300px; /* Set a fixed height for all review boxes */
            overflow: hidden; /* Hide overflowing content */
        }

        .review-box img{
            height: 7rem;
            width: 7rem;
            border-radius: 50%;
            object-fit: cover;
        }

        .review-box h3{
            color: var(--black);
            font-size: 2.2rem;
            padding: .5rem 0;
        }

        .review-box p{
            color: var(--light-color);
            font-size: 1.4rem;
            padding: 1rem 0;
            line-height: 2;
        }

        .review-content {
            max-height: 100%;
            overflow: hidden;
        }
        .read-more-btn {
            display: none;
            margin-top: 5px;
            cursor: pointer;
        }
        .read-more-btn.show {
            display: block;
        }
    </style>

</head>
<body>
    
<section class="reviews" id="reviews">

    <h1 class="heading"> <span>Reviews</span> </h1>

    <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

        <?php
        // Include the database connection
        include 'connect.php';

        // Query to fetch all reviews
        $query = "SELECT * FROM `review`";
        $result = mysqli_query($conn, $query);

        // Check if there are any reviews
        if(mysqli_num_rows($result) > 0) {
            // Loop through each review and display them
            while($fetch_user = mysqli_fetch_assoc($result)) {
        ?>
        <div class="swiper-slide review-box"> 
          <div class="box-content">
            <img src="images/<?php echo $fetch_user['IMAGE']; ?>" alt="">
            <h3 class="name"><?php echo $fetch_user['NAME']; ?></h3>
            <div class="review-content">
              <p><?php echo $fetch_user['MESSAGE']; ?></p>
            </div>
            <button class="read-more-btn">Read More</button>
          </div>
        </div>
        <?php
            }
        } else {
            echo "<p>No reviews found.</p>";
        }
        ?>

        </div>

    </div>

</section>

<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
    spaceBetween: 10,
    loop:true,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});



</script>

</body>
</html>
