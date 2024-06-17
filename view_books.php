<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>books</title>

     <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="book.css">

</head>
<body>


    <div class="container">


        <div class="book-container">
            <?php
            // Include database connection file
            include 'connect.php';

            // Check if seller's email is provided in the URL
            if (isset($_GET['user_email'])) {
                // Get the seller's email from the URL parameter
                $seller_email = $_GET['user_email'];

                // Query to fetch books added by the seller
                $books_query = mysqli_query($conn, "SELECT * FROM `products` WHERE EMAIL = '$seller_email'") or die('Query failed');

                // Display books if found, otherwise display a message
                if (mysqli_num_rows($books_query) > 0) {
                    while ($fetch_books = mysqli_fetch_assoc($books_query)) {
                        ?>
                        <div class="book">
                           <img src="images/<?php echo $fetch_books['IMAGE']; ?>" >
                           <h3 class="name"><?php echo $fetch_books['NAME']; ?></h3>
                           <p class="price">Rs.  <?php echo $fetch_books['PRICE']; ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No books found for this seller.</p>";
                }
            } else {
                // If seller's email is not provided, display a message
                echo "<p>Seller's email not provided.</p>";
            }
            ?>
        </div>
    </div>
    
</body>
</html>
