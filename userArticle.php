<!-- Programmer Name: Tay Wei Qin
Program Name: userArticle.php
Description: View Article (User)
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
include "dbConn.php";
include "header.php";
$query = "SELECT * FROM alumni_t";
$results = mysqli_query($connection, $query);

// Array of YouTube video details
$videos = array(
    array("title" => "Accounting & Finance", "url" => "https://www.youtube.com/watch?v=DzFLyW9jfBQ"),
    array("title" => "Creative Art & Design", "url" => "https://www.youtube.com/watch?v=o5JcQiQDmq0"),
    array("title" => "Engineering", "url" => "https://www.youtube.com/watch?v=zoHm5AXeYYQ"),
    array("title" => "Information Technology", "url" => "https://www.youtube.com/watch?v=XZrckLYqdys"),
    array("title" => "Medical & Health Science", "url" => "https://www.youtube.com/watch?v=pTHFU7oxeQs")
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edu Advisor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="userArticle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <!-- <script src="https://kit.fontawesome.com/ed7a464247.js" crossorigin="anonymous"></script> -->

</head>
<body>
<h1 class="articleTitle">Article</h1>
<div class="video-container">
  <div class="video-card">
    <iframe class="video" src="https://www.youtube.com/embed/DzFLyW9jfBQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Accounting & Finance</h3>
  </div>

  <div class="video-card">
    <iframe class="video" src="https://www.youtube.com/embed/o5JcQiQDmq0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Creative Art & Design</h3>
    </div>

  <div class="video-card">
    <iframe class="video" src="https://www.youtube.com/embed/zoHm5AXeYYQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Engineering</h3>
    </div>

    <div class="video-card" style="margin-left:320px;">
    <iframe class="video" src="https://www.youtube.com/embed/XZrckLYqdys" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Information Technology</h3>
    </div>

    <div class="video-card">
    <iframe class="video" src="https://www.youtube.com/embed/pTHFU7oxeQs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Medical & Health Science</h3>
    </div>
</div>

<div class="hero">
  <h1>Alumni Review</h1>
  <div class="container">
    <div class="indicator">
      <?php
      $counter = 0;
      if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
          if ($counter === 0) {
            echo '<span class="btn active"></span>';
          } else {
            echo '<span class="btn"></span>';
          }
          $counter++;
        }
      }
      ?>
    </div>
    <?php
    mysqli_data_seek($results, 0); // Reset the result pointer to the beginning
    if (mysqli_num_rows($results) > 0) {
      echo '<div class="testimonial">';
      echo '<div class="slide-row" id="slide">';
      while ($row = mysqli_fetch_assoc($results)) {
        echo '<div class="slide-col">';
        echo '<div class="user-text">';
        echo '<p><b style="color:white;">Reviews:</b><br>';
        echo $row['review'] . '<br><br>';
        echo '<b style="color:white;">Current Organization:</b><br>';
        echo $row['current_organization'] . '<br>';
        echo '</p>';
        echo '<h3>' . $row['alumni_name'] . '</h3>';
        echo '<p><b>~ &nbsp' . $row['university_name'] . '</b><br> &nbsp &nbsp&nbsp' . $row['course_name'] . '</p>';
        echo '</div>';
        echo '<div class="user-img">';
        echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($row['photo']) . '" width="320px" height="344px">';
        echo '</div>';
        echo '</div>';
      }
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>
</div>


<script>
  var btn = document.getElementsByClassName("btn");
  var slide = document.getElementById("slide");
  var currentSlide = 0;
  var slideInterval = setInterval(changeSlide, 3000); // Change slide every 3 seconds

  // Function to change the active slide
  function changeSlide() {
    currentSlide = (currentSlide + 1) % btn.length; // Calculate the next slide index
    var translateValue = -800 * currentSlide;
    slide.style.transform = "translateX(" + translateValue + "px)";
    
    // Update the active button
    for (var i = 0; i < btn.length; i++) {
      btn[i].classList.remove("active");
    }
    btn[currentSlide].classList.add("active");
  }

  // Add click event listeners to the buttons
  for (var i = 0; i < btn.length; i++) {
    btn[i].addEventListener("click", function() {
      clearInterval(slideInterval); // Stop the automatic slide transition
      var index = Array.prototype.indexOf.call(btn, this);
      var translateValue = -800 * index;
      slide.style.transform = "translateX(" + translateValue + "px)";
      
      // Update the active button
      for (var j = 0; j < btn.length; j++) {
        btn[j].classList.remove("active");
      }
      this.classList.add("active");
    });
  }
</script>
<?php
    include "footer.php";
?>

</body>

</html>
