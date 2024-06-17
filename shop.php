<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old-book Corner</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="shop.css">

</head>
<body>
  
<!-- header section starts ---------------------------------------------------------------------------------------->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fa-solid fa-book"></i> Old-book Corner</a>

        <form action="" class="search-form" method="POST" enctype="multipart/form-data"> 
             <select name="college" class="box">
                <option value="">Select College</option>
                <option value="SALITER">SALITER</option>
                <option value="SCE">SCE</option>
                <option value="SETI">SETI</option>
             </select>

             <select name="semester" class="box">
                <option value="">Select Semester</option>
                <option value="semester-1">semester-1</option>
                <option value="semester-2">semester-2</option>
                <option value="semester-3">semester-3</option>
                <option value="semester-4">semester-4</option>
                <option value="semester-5">semester-5</option>
                <option value="semester-6">semester-6</option>
                <option value="semester-7">semester-7</option>
                <option value="semester-8">semester-8</option>
             </select>

             <button type="submit" class="fa-solid fa-search"></button>

        </form>

        <div class="icons">
            <div id="search-btn" class="fa-solid fa-search"></div>
            <a href="profile.php" class="fa-solid fa-user"></a>
        </div>

    </div>

</header>

<!-- header section ends ------------------------------------------------------------------------------------------>

<section class="home">

    <div class="content">
        <h3>Welcome to our shop</h3>
    </div>

</section>


<!-- search bar section starts  ----------------------------------------------------------------------------------->
<?php
// Include database connection file
include 'connect.php';
session_start();
// Initialize a variable to track whether a search has been performed
$showProfilesBeforeSearch = true;

// Check if the form is submitted
if (isset($_POST['college']) && isset($_POST['semester'])) {
    
    $selectedCollege = $_POST['college'];
    $selectedSemester =  $_POST['semester'];

    // SQL query to fetch seller profile based on selected college and semester
    $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE COLLEGE = '$selectedCollege' AND SEMESTER = '$selectedSemester'") or die('query failed');

    // Display the seller profile if found, otherwise display a message
    if (mysqli_num_rows($user_query) > 0) {
        $showProfilesBeforeSearch = false; // Set to false to hide profiles before search
        $fetch_user = mysqli_fetch_assoc($user_query);
        // Ensure that $fetch_user contains the expected data
        if (isset($fetch_user['EMAIL'])) {
            ?>
            <div class="container">
                <div class="profile">
                    <img src="images/<?php echo $fetch_user['IMAGE'];?>" >
                    <h1 class="name"> <?php echo $fetch_user['NAME']; ?></h1>
                    <p class="fa-solid fa-phone"> <?php echo $fetch_user['CONTACT']; ?> </p><br>
                    <!-- Generate the link with user email -->
                    <a href="view_books.php?user_email=<?php echo $fetch_user['EMAIL']; ?>" class="btn">View Books</a>
                </div>
            </div>
        <?php
        } else {
            echo "<p>User email not found.</p>";
        }
    } else {
        echo "<p>No seller profile found for the selected college and semester.</p>";       
    }
}

?>

<!-- search bar section ends  ------------------------------------------------------------------------------------->


<!-- display some profile before search starts  ------------------------------------------------------------------->
<?php if ($showProfilesBeforeSearch): ?>
<section class="profile">

    <div class="box-container">

        <?php
        $select_user = mysqli_query($conn, "SELECT * FROM `users` LIMIT 6 ") or die('query failed');

        if(mysqli_num_rows($select_user) > 0){
            while($fetch_user = mysqli_fetch_assoc($select_user)){
        ?>
        <div class="container">
            <div class="profile">
                <img src="images/<?php echo $fetch_user['IMAGE'];?>" >
                <h1 class="name"> <?php echo $fetch_user['NAME']; ?></h1>
                <p class="fa-solid fa-phone"> <?php echo $fetch_user['CONTACT']; ?> </p><br>
                <!-- Generate the link with user email -->
                <a href="view_books.php?user_email=<?php echo $fetch_user['EMAIL']; ?>" class="btn">View Books</a>
            </div>
        </div>
        <?php
          }
        }else{
            echo '<p class="empty">no user added yet!</p>';
        }
        ?>

    </div>   

</section>

<?php endif;?>








<!-- custom javascript file link -->
<script>
    searchForm = document.querySelector('.search-form');
    document.querySelector('#search-btn').onclick = () =>{
        searchForm.classList.toggle('active');
    }
</script>

</body>
</html>
