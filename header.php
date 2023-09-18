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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="header.css" />
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
        <div class="logo">
          <img src="images/headerLogo(1).png" alt="Icon">
        </div>
         <label for="btn" class="icon">
         <span class="fa fa-bars"></span>
         </label>
         <input type="checkbox" id="btn">
         <ul>
            <?php if(isset($_SESSION['userloggedIn'])):?>
               <li><a href="index.php">Home</a></li>
            <?php elseif(isset($_SESSION['adminloggedIn'])):?>
               <li><a href="AdminPage.php">Home</a></li>
            <?php else: ?>
               <li><a href="index.php">Home</a></li>
            <?php endif; ?>
            <li><a href="university.php">University</a></li>
            <li>
               <label for="btn-1" class="show">Courses +</label>
               <a href="course.php">Courses</a>
               <input type="checkbox" id="btn-1">
               <ul>
                  <li><a href="courseLists.php?category=Accounting">Accounting & Finance</a></li>
                  <li><a href="courseLists.php?category=Architecture">Architecture & Environment</a></li>
                  <li><a href="courseLists.php?category=Business">Business & Marketing</a></li>
                  <li><a href="courseLists.php?category=Mass Comm">Communication & Media</a></li>
                  <li><a href="courseLists.php?category=Art">Art & Design</a></li>
                  <li><a href="courseLists.php?category=Engineering">Engineering</a></li>
                  <li><a href="courseLists.php?category=Information Technology">Information Technology</a></li>
                  <li><a href="courseLists.php?category=Law">Law</a></li>
                  <li><a href="courseLists.php?category=Medical">Medical Health</a></li>
               </ul>
            </li>
            <li><a href="scholarships.php">Scholarship</a></li>
            <li><a href="interest_test_Main.php">Interest Test</a></li>
            <li><a href="userArticle.php">Article</a></li>
            <?php if(isset($_SESSION['userloggedIn'])):?>
               <li><a href="apply.php">Apply University</a></li>
               <li>
                  <label for="btn-2" class="show"><i class="ri-user-fill"></i>&nbsp User +</label>
                  <a href="#"><i class="ri-user-fill"></i>&nbsp User</a>
                  <input type="checkbox" id="btn-2">
                  <ul>
                     <li><a href="userProfile.php">Profile</a></li>
                     <li style="color:red;"><a href="logout.php">Logout</a></li>
                  </ul>
               </li>
            <?php elseif(isset($_SESSION['adminloggedIn'])):?>
               <li>
                  <label for="btn-2" class="show"><i class="ri-user-fill"></i>&nbsp User +</label>
                  <a href="#"><i class="ri-user-fill"></i>&nbsp User</a>
                  <input type="checkbox" id="btn-2">
                  <ul>
                     <li><a href="userProfile.php">Profile</a></li>
                     <li style="color:red;"><a href="logout.php">Logout</a></li>
                  </ul>
               </li>
            <?php else: ?>
               <li><a href="login.php">Login</a></li>
            <?php endif; ?>
         </ul>
      </nav>
      <script>
         $('.icon').click(function(){
           $('span').toggleClass("cancel");
         });
      </script>
   </body>
</html>
