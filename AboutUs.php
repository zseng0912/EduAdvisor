<!-- Programmer Name: Voon Jin Hui
Program Name: AboutUs.php
Description: About Us
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->

<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <title>Course Lists</title>
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <style>
    html { 
        /* background: url(images/mainbg.png) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover; */
    }
    a{
      text-decoration: none;
      color: black;
    }

    </style>
</head>
<body>
  <div class='console-container'>
    <div id='text-container'>
      <span id='prefix'>Finding The Right&nbsp</span>
      <span id='text'></span>
      <div class='console-underscore' id='console'>&#95;</div>
    </div>
  </div>
  <div class="intro">
    <h1 class="what_text">What is EduAdvisor ?</h1><br><br>
    <h3>EduAdvisor is the leading centralized university application website in Malaysia.</h3>
    <p>One of the biggest, scariest decisions you will ever make is the path to take for your college and university career.
      <br><br>
      You do an internet search, visit several university websites, and lurk on discussion boards in an effort to learn more about things like tuition costs, scholarships, eligibility requirements, course lengths, and other things. Before you know it, your browser has a million tabs open.
      <br><br>
      Online might not be the best option.
      <br><br>
      You then go to career fairs, tour a number of colleges during open houses, and come home with mountains of pamphlets that are filled with words you don't comprehend. At the end of the day, everything is starting over.
      <br><br>
      However, things don't have to be that way.</p>
  </div>

<div class="services">
  <div class="title">
  <h1>Why Choose EduAdvisor?</h1><br>
  <h3>Unlike other platforms, agents or direct application at university, you get:</h3>
  </div>

  <div class="card-session">
  <div class="card-container">
  <div class="card">
  <div class="front-content">
    <img src="images/aboutUs1.png" alt="service1" width="180px" height="180px">
    <p>You discover and save more on your education</p>
  </div>
  <div class="content">
    <p class="heading">Instantly get matched with</p>
    <p>
      <ul style="margin-left:10px;">
        <i class="fa-solid fa-circle-check"></i>&nbsp30 local universities<br>
        <i class="fa-solid fa-circle-check"></i>&nbsp1000 courses<br>
        <i class="fa-solid fa-circle-check"></i>&nbspOver 100 scholarships and offers based on your academic, family background or achievements<br>
      </ul>
    </p>
  </div>
</div>
</div>

<div class="card-container">
  <div class="card">
  <div class="front-content">
    <img src="images/aboutUs2.png" alt="service2" width="140px" height="140px" style="margin:32px;"> 
    <p>Our interest test help analyze your field of study</p>
  </div>
  <div class="content">
    <p class="heading">Our interest test are prepare to</p>
    <p>
    <ul style="margin-left:10px;">
        <i class="fa-solid fa-circle-check"></i>&nbspAnalyze your field of study <br>
        <i class="fa-solid fa-circle-check"></i>&nbspClear your doubts and concerns <br>
        <i class="fa-solid fa-circle-check"></i>&nbspGuide you to choose the right course <br>
      </ul>
    </p>
  </div>
</div>
</div>

<div class="card-container">
  <div class="card">
  <div class="front-content">
    <img src="images/aboutUs3.png" alt="service3" width="150px" height="140px" style="margin:29px;">
    <p>You can easily apply online secure your scholarships and course</p>
  </div>
  <div class="content">
    <p class="heading">Only available from EduAdvisor</p>
    <p>
      <ul style="margin-left:10px;">
        <i class="fa-solid fa-circle-check"></i>&nbspScholarships and offers are limited <br> *secure them quickly online* <br>
        <i class="fa-solid fa-circle-check"></i>&nbspApply the full application on yourself <br>
      </ul>
    </p>
  </div>
</div>
</div>
</div>
</div>

<div class="location">
  <img src="images/aboutUsLocation.png" alt="University Location" width="100%">
</div>
</body>
<?php
  include "footer.php";
?>
<script>  
// function([string1, string2],target id,[color1,color2])    
 consoleText(['Course', 'University', 'Scholarship'], 'text',['white','white','white']);

function consoleText(words, id, colors) {
  if (colors === undefined) colors = ['#fff'];
  var visible = true;
  var con = document.getElementById('console');
  var letterCount = 1;
  var x = 1;
  var waiting = false;
  var target = document.getElementById(id)
  target.setAttribute('Khula', 'color:' + colors[0])
  window.setInterval(function() {

    if (letterCount === 0 && waiting === false) {
      waiting = true;
      target.innerHTML = words[0].substring(0, letterCount)
      window.setTimeout(function() {
        var usedColor = colors.shift();
        colors.push(usedColor);
        var usedWord = words.shift();
        words.push(usedWord);
        x = 1;
        target.setAttribute('Khula', 'color:' + colors[0])
        letterCount += x;
        waiting = false;
      }, 1000)
    } else if (letterCount === words[0].length + 1 && waiting === false) {
      waiting = true;
      window.setTimeout(function() {
        x = -1;
        letterCount += x;
        waiting = false;
      }, 1000)
    } else if (waiting === false) {
      target.innerHTML = words[0].substring(0, letterCount)
      letterCount += x;
    }
  }, 120)
  window.setInterval(function() {
    if (visible === true) {
      con.className = 'console-underscore hidden'
      visible = false;

    } else {
      con.className = 'console-underscore'

      visible = true;
    }
  }, 400)
}
</script>
</html>
