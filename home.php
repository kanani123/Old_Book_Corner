<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old-book Corner</title>

    <!-- swiper css link -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
   

</head>
<body>
  
<!-- header section starts ---------------------------------------------------------------------------------------->

<header class="header">

<div class="header-1">

    <a href="#" class="logo"> <i class="fa-solid fa-book"></i> Old-book Corner</a>

    <div class="icons">
        <a href="login.php" class="fa-solid fa-user"></a>
    </div>

</div>

</header>



<div class="header-2">
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#blogs">blogs</a>
        <a href="#reviews">reviews</a>
        <a href="#contact">contact us</a>
    </nav>
</div>

<!-- header section ends ------------------------------------------------------------------------------------------>

<!-- bottom navbar starts ----------------------------------------------------------------------------------------->

<nav class="bottom-navbar">
    <a href="#home" class="fa-solid fa-home"></a>
    <a href="#blogs" class="fa-solid fa-blog"></a>
    <a href="#reviews" class="fa-solid fa-comments"></a>
    <a href="#contact" class="fa-solid fa-phone"></a>
</nav>

<!-- bottom navbar ends ------------------------------------------------------------------------------------------->

<!-- home section starts ------------------------------------------------------------------------------------------>

    <section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>upto 75% off</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, dolor beatae officia laboriosam sed quidem delectus! Voluptatum fugiat qui quas!</p>
            <a href="login.php" class="btn">view shop</a>
        </div>
        
        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="/image/1.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="/image/2.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="/image/3.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="/image/4.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="/image/7.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="/image/6.jpg" alt=""></a>
            </div>               
            <img src="/image/stand.png" class="stand" alt="">
        </div>

    </div>

    </section>

<!-- home section ends -------------------------------------------------------------------------------------------->

<!-- icons section starts ----------------------------------------------------------------------------------------->

    <section class="icons-container">

        <div class="icons">
            <i class="fa-solid fa-clock"></i>
              <div class="content">
                 <h3>time saving</h3>
                 <p>save your time</p>
              </div>
        </div>

        <div class="icons">
           <i class="fa-solid fa-thumbs-up"></i>
              <div class="content">
                 <h3>easy use</h3>
                 <p>easy to use</p>
              </div>
        </div>

        <div class="icons">
            <i class="fa-solid fa-indian-rupee-sign"></i>
              <div class="content">
                 <h3>money saving</h3>
                 <p>save your money</p>
              </div>
        </div>

        <div class="icons">
            <i class="fa-solid fa-phone"></i>
              <div class="content">
                 <h3>easy dealing</h3>
                 <p>direct contact with dealer</p>
              </div>
        </div>

    </section>

<!-- icons section ends ------------------------------------------------------------------------------------------->

<!-- blogs section starts  ---------------------------------------------------------------------------------------->

<?php

include 'blog.php';

?>

<!-- blogs section ends  ------------------------------------------------------------------------------------------>


<!-- reviews section ends ----------------------------------------------------------------------------------------->

<?php

include 'reviews.php';

?>



<!-- reviews section ends ----------------------------------------------------------------------------------------->


<!-- footer section starts ---------------------------------------------------------------------------------------->

    <section class="footer" id="contact">

        <div class="box-container">
            
            <div class="box">
                <h3>our locations</h3>
                <a href="#"><i class="fa-solid fa-map-marker-alt"></i>india</a>
                <a href="#"><i class="fa-solid fa-map-marker-alt"></i>USA</a>
                <a href="#"><i class="fa-solid fa-map-marker-alt"></i>russia</a>
                <a href="#"><i class="fa-solid fa-map-marker-alt"></i>france</a>
                <a href="#"><i class="fa-solid fa-map-marker-alt"></i>japan</a>
                <a href="#"><i class="fa-solid fa-map-marker-alt"></i>africa</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="fa-solid fa-arrow-right"></i>home</a>
                <a href="#blogs"><i class="fa-solid fa-arrow-right"></i>blogs</a>
                <a href="#reviews"><i class="fa-solid fa-arrow-right"></i>reviews</a>
                <a href="#contact"><i class="fa-solid fa-arrow-right"></i>contact us</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fa-solid fa-phone"></i> +123-456-7890 </a>
                <a href="#"><i class="fa-solid fa-phone"></i> +111-222-3333 </a>
                <a href="#"><i class="fa-solid fa-envelope"></i> theboys@gmail.com </a>
                <img src="/image/map.png" class="map" alt="">
            </div>

        </div>

        <div class="share">
                <a href="#" class="fa-brands fa-facebook-f"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="#" class="fa-brands fa-instagram"></a>
                <a href="#" class="fa-brands fa-linkedin"></a>
                <a href="#" class="fa-brands fa-pinterest"></a>
        </div>

        <div class="credit"> created by <span>team the boys </span> | all rights reserved! </div>

    </section>

<!-- footer section ends ------------------------------------------------------------------------------------------>






<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- custom javascript file link -->
<script src="script.js"></script>

</body>
</html>