<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE EMAIL = '$email' AND PASSWORD = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

     $row = mysqli_fetch_assoc($select_users);
     $_SESSION['user_email'] = $row['EMAIL'];
     header('location:shop.php');

   } else {
     $message[] = 'Incorrect email or password!';
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
    
<div class="login-form-container">

<a id="close-login-btn" href="home.php" class="fa-solid fa-times"></a>

    <form action="" method="post">
        <h3>sign in</h3>
        <?php
         if(isset($message)){
            foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
            }
         }
        ?>
        <span>Email</span>
        <input type="email" name="email" class="box" placeholder="enter your email" required class="box">
        <span>Password</span>
        <input type="password" name="password" class="box" placeholder="enter your password" required class="box">
        <input type="submit" name="submit" value="sign in" class="btn">
        <p>don't have an account ? <a href="register.php">register</a></p>
    </form>

</div>









<!-- custom javascript file link -->
<script>

let loginForm = document.querySelector('.login-form-container');

document.querySelector('#close-login-btn').onclick = () =>{
    loginForm.classList.remove('active');
}

</script>

</body>
</html>