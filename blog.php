<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<section class="blogs" id="blogs">

    <h1 class="heading"> <span>our blogs</span> </h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>
            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>
            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>
            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>
            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-5.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>
            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>
            <div class="swiper-slide box">

                <div class="image">
                    <img src="/image/blog-4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima, soluta quia amet ullam eius.</p>
                    <a href="#" class="btn">read more</a>
                </div>

            </div>

        </div>

    </div>

</section>




<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>

var swiper = new Swiper(".blogs-slider", {
  spaceBetween: 10,  
  loop:true,
  centeredSlides: true,
  autoplay: {
      delay: 3000,
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