<?php

include 'connect.php';

if(isset($_POST['submit'])){

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);
      $contact = mysqli_real_escape_string($conn,$_POST['contact']);
      $college = mysqli_real_escape_string($conn, $_POST['college']);
      $semester = mysqli_real_escape_string($conn, $_POST['semester']);
      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'images/'.$image;
   
   
      $add_user_query = mysqli_query($conn, "INSERT INTO `users`( `NAME`, `EMAIL`, `PASSWORD`, `CONTACT`, `COLLEGE`, `SEMESTER`, `IMAGE`) VALUES ('$name','$email','$pass','$contact','$college','$semester','$image')") or die('query failed');
   
         if($add_user_query){
            if($image_size > 2000000){
               $message[] = 'image size is too large';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               header('location:login.php');
            }
         }
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

     <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<div class="register-form-container">

<a id="close-register-btn" href="login.php" class="fa-solid fa-times"></a>

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>register now</h3>
      <?php
         if(isset($message)){
            foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="tel" name="contact" placeholder="enter your contact number" required class="box">
      <select name="college" class="box">
            <option value="SALITER">SALITER</option>
            <option value="SCE">SCE</option>
            <option value="SETI">SETI</option>
      </select>
      <select name="semester" class="box">
            <option value="semester-1">semester-1</option>
            <option value="semester-2">semester-2</option>
            <option value="semester-3">semester-3</option>
            <option value="semester-4">semester-4</option>
            <option value="semester-5">semester-5</option>
            <option value="semester-6">semester-6</option>
            <option value="semester-7">semester-7</option>
            <option value="semester-8">semester-8</option>
      </select>
      <span>choose profile photo</span>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>









<!-- custom javascript file link -->
<script>

let registerForm = document.querySelector('.register-form-container');

document.querySelector('#close-register-btn').onclick = () =>{
    loginForm.classList.remove('active');
}

</script>

</body>
</html>