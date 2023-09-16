<?php
    session_start();
    include "dbConn.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eduadvisor</title>
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
    <style>
      ::-webkit-scrollbar {
        width: 8px;
      }
      
      ::-webkit-scrollbar-track {
        background: #f1f1f1; 
      }
      
      ::-webkit-scrollbar-thumb {
        background: #888; 
      }
      
      ::-webkit-scrollbar-thumb:hover {
        background: #555; 
      }
    </style>
  </head>
  <body>
    <nav>
      <a href="#home" id="logo">
        <img class="homeLogo" src="images/headerLogo(1).png" alt="Icon">
      </a>
      <input type="checkbox" id="hamburger" />
      <label for="hamburger">
        <i class="fa-solid fa-bars"></i>
      </label>
      <ul>
        <?php if(isset($_SESSION['userloggedIn'])):?>
        <li>
          <a href="index.php" class="active">Home</a>
        </li>
        <?php elseif(isset($_SESSION['adminloggedIn'])):?>
        <li>
          <a href="AdminPage.php" class="active">Home</a>
        </li>
        <?php else: ?>
        <li>
          <a href="index.php" class="active">Home</a>
        </li>
        <?php endif; ?>
        <li>
          <a href="university.php">University</a>
        </li>
        <li>
          <a href="course.php">Courses</a>
        </li>
        <li>
          <a href="scholarships.php">Scholarship</a>
        </li>
        <li>
          <a href="interest_test_Main.php">Interest Test</a>
        </li>
        <li>
          <a href="userArticle.php">Article</a>
        </li>

        <?php if(isset($_SESSION['userloggedIn'])):?>
        <li>
          <a href="apply.php">Apply University</a>
        </li>
        <li><a href="#"><i class="ri-user-fill"></i>User</a>
            <ul>
                <li><a href="userProfile.php">Profile</a></li>
                <li style="color:red;"><a href="logout.php">Logout</a></li>
            </ul>
        </li>
        <?php elseif(isset($_SESSION['adminloggedIn'])):?>
        <li><a href="#"><i class="ri-user-fill" style="width:100px"></i></a>
            <ul>
                <li><a href="adminProfile.php">Profile</a></li>
                <li style="color:red;"><a href="logout.php">Logout</a></li>
            </ul>
        </li>
        <?php else: ?>
        <li>
          <a href="login.php">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </body>
</html>
