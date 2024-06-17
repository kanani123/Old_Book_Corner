<?php

include 'connect.php'; 
session_start(); 

if(isset($_POST['update_profile'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_email = $_POST['update_email'];
   $update_password = $_POST['update_password'];
   $update_contact = $_POST['update_contact'];
   $update_college = $_POST['update_college'];
   $update_semester = $_POST['update_semester'];

   mysqli_query($conn, "UPDATE `users` SET NAME = '$update_name', EMAIL = '$update_email', PASSWORD = '$update_password', CONTACT = '$update_contact', COLLEGE = '$update_college', SEMESTER = '$update_semester' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'images/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `users` SET IMAGE = '$update_image' WHERE ID = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('images/'.$update_old_image);
      }
   }

   header('location:profile.php');

}

if(isset($_POST['add_books'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $email = $_SESSION['user_email'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'images/'.$image;

      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(EMAIL, NAME, PRICE, IMAGE) VALUES('$email', '$name', '$price', '$image')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE ID = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('images/'.$fetch_delete_image['IMAGE']);
   mysqli_query($conn, "DELETE FROM `products` WHERE ID = '$delete_id'") or die('query failed');
   header('location:profile.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="profile.css">

</head>
<body>
  
<!-- header section starts ---------------------------------------------------------------------------------------->

<header>

    <div class="user">
       <?php
         // Check if user is logged in
         if(isset($_SESSION['user_email'])) {
            $user_email = $_SESSION['user_email'];
            $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE EMAIL = '$user_email'") or die('query failed');
            if(mysqli_num_rows($user_query) > 0){
               $fetch_user = mysqli_fetch_assoc($user_query);
      ?>
       
       <img src="images/<?php echo $fetch_user['IMAGE'];?>" height="120px" width="120px" >
       <h3 class="name"> <?php echo $fetch_user['NAME']; ?></h3> 
      
      <?php
            } 
         }
      ?>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="#profile">My Profile</a></li>
            <li><a href="#add-books">Add books</a></li>
            <li><a href="#show-books">My books</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

</header>   

<!-- header section ends ------------------------------------------------------------------------------------------>

<div id="menu" class="fa-solid fa-bars"></div>

<!-- profile section starts  -------------------------------------------------------------------------------------->

<section class="profile" id="profile">

    <h1>My profile</h1>

      <?php
         // Check if user is logged in
         if(isset($_SESSION['user_email'])) {
            $user_email = $_SESSION['user_email'];
            $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE EMAIL = '$user_email'") or die('query failed');
            if(mysqli_num_rows($user_query) > 0){
               $fetch_user = mysqli_fetch_assoc($user_query);
      ?>
      <div class="box"> 
         <div class="name">Name : <?php echo $fetch_user['NAME']; ?></div>
         <div class="email">Email : <?php echo $fetch_user['EMAIL']; ?></div>
         <div class="password">Password : <?php echo $fetch_user['PASSWORD']; ?></div>
         <div class="contact">Contact : <?php echo $fetch_user['CONTACT']; ?></div>
         <div class="college">College : <?php echo $fetch_user['COLLEGE']; ?></div>
         <div class="semester">Semester : <?php echo $fetch_user['SEMESTER']; ?></div>
         <a href="profile.php?update=<?php echo $fetch_user['ID']; ?>" class="btn">Update</a>
      </div>
      <?php
            } 
         }
      ?>

</section>

<!-- profile section ends  ---------------------------------------------------------------------------------------->

<!-- profile update starts  --------------------------------------------------------------------------------------->
<section class="edit-profile-form">

<?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['ID']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['IMAGE']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['IMAGE']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['NAME']; ?>" class="box" required placeholder="enter your name">
      <input type="email" name="update_email" value="<?php echo $fetch_update['EMAIL']; ?>" class="box" required placeholder="enter tour email">
      <input type="text" name="update_password" value="<?php echo $fetch_update['PASSWORD']; ?>" class="box" required placeholder="enter your password">
      <input type="tel" name="update_contact" value="<?php echo $fetch_update['CONTACT']; ?>" class="box" required placeholder="enter your contact">
      <select name="update_college" value="<?php echo $fetch_update['COLLEGE']; ?>" class="box">
            <option value="SALITER">SALITER</option>
            <option value="SCE">SCE</option>
            <option value="SETI">SETI</option>
      </select>
      <select name="update_semester" value="<?php echo $fetch_update['SEMESTER']; ?>" class="box">
            <option value="semester-1">semester 1</option>
            <option value="semester-2">semester 2</option>
            <option value="semester-3">semester 3</option>
            <option value="semester-4">semester 4</option>
            <option value="semester-5">semester 5</option>
            <option value="semester-6">semester 6</option>
            <option value="semester-7">semester 7</option>
            <option value="semester-8">semester 8</option>
      </select>
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_profile" class="btn">
      <input type="reset" value="cancel" id="close-update" class="btn">
      
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-profile-form").style.display = "none";</script>';
      }
   ?>

</section>


<!-- profile update ends  ----------------------------------------------------------------------------------------->


<!-- add books section starts  ------------------------------------------------------------------------------------>


<section class="add-books" id="add-books">
   
   <h1>Add Books</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add book</h3>
      <input type="text" name="name" class="box" placeholder="enter product name" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="Add book" name="add_books" class="btn">
   </form>

</section>

<!-- add books section ends  -------------------------------------------------------------------------------------->

<!-- show books section starts  ----------------------------------------------------------------------------------->

<section class="show-books" id="show-books">

   <h1>My Books</h1>

   <div class="box-container">

   <?php
         // Check if user is logged in
         if(isset($_SESSION['user_email'])) {
            $user_email = $_SESSION['user_email'];
            $product_query = mysqli_query($conn, "SELECT * FROM `products` WHERE EMAIL = '$user_email'") or die('query failed');
            if(mysqli_num_rows($product_query) > 0){
               while($fetch_products = mysqli_fetch_assoc($product_query)){
      ?>   

      <div class="box">
         <img src="images/<?php echo $fetch_products['IMAGE']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['NAME']; ?></div>
         <div class="price">Rs.<?php echo $fetch_products['PRICE']; ?>/-</div>
         <a href="profile.php?delete=<?php echo $fetch_products['ID']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
         } 
   
      ?>
   </div>

</section>


<!-- show books section ends  ------------------------------------------------------------------------------------->





<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!-- custom javascript -->
<script>

$(document).ready(function(){

    $('#menu').click(function(){
        $(this).toggleClass('fa-times');
        $('header').toggleClass('toggle');
    });

    $(window).on('scroll load',function(){
        $('#menu').removeClass('fa-times');
        $('header').removeClass('toggle');
    });

});

document.querySelector('#close-update').onclick = () =>{
   document.querySelector('.edit-profile-form').style.display = 'none';
   window.location.href = 'profile.php';
}

</script>

</body>
</html>
