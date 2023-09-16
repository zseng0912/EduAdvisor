<!-- Programmer Name: Tan Zu Seng
Program Name: course.php
Description: Course Category
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
include "header.php";
include "dbConn.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Course.css">
    <title>EduAdvisor</title>
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <style>
    html { 
        background: url(images/mainbg.png) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    a{
      text-decoration: none;
      color: black;
    }

    </style>
</head>
<body>

<div id="wrapper">
<h4 class="studytitle">Field of Study</h4>
   <a href="courseLists.php?category=Accounting">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Accounting.png)">
            <h2 class="text-shadow">Accounting</h2>
         </div>
         <div class="back">
            <p>The study of tracking, analyzing, and managing financial information and resources within organizations and the broader economy.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Architecture">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Architecture.jpeg)">
            <h2 class="text-shadow">Architecture</hi>
         </div>
         <div class="back">
            <p>The study of designing and constructing buildings, urban spaces, and infrastructure while considering aesthetic, functional, and sustainable principles.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Business">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Business.png)">
            <h2 class="text-shadow">Business</hi>
         </div>
         <div class="back">
            <p>The study of principles and strategies for managing organizations, marketing products or services, and achieving business goals.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Mass Comm">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/MassComm.png)">
            <h2 class="text-shadow">Mass Comm</hi>
         </div>
         <div class="back">
            <p>The study of how individuals, societies, and organizations create, transmit, and interpret messages through various forms of communication and media.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Art">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Art.png)">
            <h2 class="text-shadow">Art & Design</hi>
         </div>
         <div class="back">
            <p>The study of artistic expression, design principles, and creative problem-solving across various mediums such as visual arts, graphic design, and multimedia.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Engineering">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Engineering.png)">
            <h2 class="text-shadow">Engineering</hi>
         </div>
         <div class="back">
            <p>The study of applying scientific and mathematical principles to design, build, and innovate solutions to technical challenges and improve society's infrastructure and technology.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Information Technology">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/IT.png)">
            <h2 class="text-shadow">IT</hi>
         </div>
         <div class="back">
            <p>The study of utilizing computer systems, networks, software, and digital technologies to store, process, and transmit information for various purposes.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Law">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Law.png)">
            <h2 class="text-shadow">Law</hi>
         </div>
         <div class="back">
            <p>The study of legal systems, regulations, and principles governing society, including the interpretation and application of laws in different contexts.</p>
         </div>
      </div>
   </a>

   <a href="courseLists.php?category=Medical">
      <div class="flip flip-vertical">
         <div class="front" style="background-image: url(images/Medical.png)">
            <h2 class="text-shadow">Medical</hi>
         </div>
         <div class="back">
            <p>The study of human health, medical practices, and scientific research to understand diseases, develop treatments, and promote well-being.</p>
         </div>
      </div>
   </a>

</body>
<?php
  include "footer.php";
?>
</html>