<!-- Programmer Name: Tan Zu Seng
Program Name: HomePage.php
Description: Home Page
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
    include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/EduAdvisor.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="stylesheet" href="index.css" />
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

body {
        width: 100%;
        height: 100%;
    }
</style>
</head>
<body>
  <section class="home_section">
      <div class="overlay">
        <div class="container">
          <div class="home">
            <h1><span>streamline</span> your joney <br>to <span>educational</span> <br><span>excellence</span> today</h1>
            <div class="home_buttons">
              <a href="course.php"><button class="btn1">Explore Course</button></a>
              <a href="login.php"><button><i class="fas fa-play"></i>Apply Now</button></a>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="services">
    <div class="container">
      <div class="title">
        <h1>World's best university application<span> Services</span></h1>
        <span class="slogan">enjoy our services.</span>
      </div>
      <div class="services_boxes">
        <div class="box">
          <i class="fa-solid fa-hotel"></i>
          <h3>Seamless</h3>
          <p>Our user-friendly application platform offers an intuitive and seamless interface for easy system service access.</p>
        </div>

        <div class="box br">
          <i class="fa-solid fa-plane"></i>
          <h3>Swift</h3>
          <p>Our centralized application system maximizes speed and efficiency, minimizing delays for timely submissions.</p>
        </div>

        <div class="box">
          <i class="fa-solid fa-mountain-sun"></i>
          <h3>Simplified</h3>
          <p>Simplify the application process by providing clear instructions and removing complexities for your convenience.</p>
        </div>
      </div>
  </div>
  </section>

  <div class="slider">
    <h4 style="text-align:center;  color: #666;margin-bottom:">Our students are currently studying in these abroad & local partner universities</h4>
    <br>
  <div class="slide-track">
    <div class="slide">
        <img src="images/homeUni1.png" width="180px" height="150px" alt="">
    </div>
    <div class="slide">
        <img src="images/homeUni2.png" width="180px" height="150px" alt="">
    </div>
    <div class="slide">
        <img src="images/homeUni3.png" width="180px" height="150px" alt="">
    </div>
    <div class="slide">
        <img src="images/homeUni4.png" width="180px" height="150px" alt="">
    </div>
    <div class="slide" style="margin-right:20px;">
        <img src="images/homeUni5.png" width="150px" height="150px" alt="">
    </div>
    <div class="slide" style="margin-top:8px;margin-right:20px;">
        <img src="images/homeUni6.png" width="160px" height="120px" alt="">
    </div>
    <div class="slide" style="margin-top:8px;margin-right:20px;">
        <img src="images/homeUni7.png" width="160px" height="120px" alt="">
    </div>
    <div class="slide" style="margin-top:8px;margin-right:20px;">
        <img src="images/homeUni8.png" width="160px" height="120px" alt="">
    </div>
    <div class="slide" style="margin-top:8px;margin-right:20px;">
        <img src="images/homeUni9.png" width="160px" height="120px" alt="">
    </div>
    <div class="slide" style="margin-top:8px;margin-right:20px;">
        <img src="images/homeUni10.png" width="160px" height="120px" alt="">
    </div>
  </div>
</div>

<div class="sections-container" style="margin: 70px;">
  <!-- about Section -->
  <section class="about" id="about">
      <div class="image">
        <img src="images/home1.png" width="350px" height="500px" alt="" />
      </div>

      <div class="content">
        <h3>Deciding what to study?</h3>
        <p>
          Find out if you're on the right track when you asnwer to the interest test.
         You'll get to know your interested field of study to make the best decision to take charge of your future.
        </p>
        <a href="interest_test_Main.php" class="btn">learn more</a>
      </div>
    </section>

    <section class="about" id="about">
      <div class="content">
        <h3>Looking for scholarships?</h3>
        <p>
        Submit your results and get a list of personalised scholarship offers based on your results and personal circumstances.
        </p>
        <a href="scholarships.php" class="btn">learn more</a>
      </div>

      <div class="image">
        <img src="images/home2.png" width="300px" height="450px"alt="" />
      </div>
    </section>

    <section class="about" id="about">
      <div class="image">
        <img src="images/home3.png" width="300px" height="450px" alt="" />
      </div>

      <div class="content">
        <h3>Applying for university?</h3>
        <p>
        Experience seamless and hassle-free application to university. 
        Simply tell us what you want and we'll do the rest for you.
        </p>
        <a href="login.php" class="btn">Start Application</a>
      </div>
    </section>
</div>

</body>
</html>