<!-- Programmer Name: Tang Jin Xun
Program Name: uniDetail.php
Description: View University Details
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";
$uniID = $_GET['id'];
$query = "SELECT * FROM university_t WHERE university_id='$uniID'";
$query2 = "SELECT * FROM course_t WHERE university_id='$uniID'";
$results = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edu Advisor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/EduAdvisor.png">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="content.css">
  <link rel="stylesheet" href="banner.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://kit.fontawesome.com/ed7a464247.js" crossorigin="anonymous"></script>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS0FtMn70oTW26ekR9cqLbFlJ8-YColyA&callback=initMap">
</script>
</head>
<body>
  <script>
    // Call the initMap function when the page loads
    window.addEventListener('load', function() {
      initMap();
    });
  </script>
    <!-- Insert ur content here -->

    <div class="title">
        <h1>University Detail</h1>
    </div>
    <?php 
    if (mysqli_num_rows($results) > 0)
        while ($row = mysqli_fetch_assoc($results)) {
            ?>
            <!-- <div class="displayBox"> -->
                <img id="uniImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['logo']); ?>" alt="university_image"/> 
                <div class="uniDes">
            <?php
            echo "<h2>" . $row["university_name"]. "</h2>";
            echo "<br>";
            echo "<h3>Description:</h3>";
            echo "<p>" . $row["description"]. "</p>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
            ?>
            <br><hr/><br>
            <h2 id="kInfo">Key Information <i class="fa-solid fa-circle-info"></i></h2>

            <div class = "displayBox">
            <?php 
                  $foundation_intakes = explode(',', $row['foundation_intake']);
                  $diploma_intakes = explode(',', $row['diploma_intake']);
                  $degree_intakes = explode(',', $row['degree_intake']);?>

                <h2>Intake</h2>
                <div class = "intake">
                  <br><h3>Foundation intake:</h3><br>
                  <ul class="course-intake" style="line-height:2.0em;">
                    <?php
                        foreach ($foundation_intakes as $foundation_intake) {
                    ?>
                        <li><strong><i class="fa-solid fa-paper-plane"></i>&nbsp &nbsp<?php echo trim($foundation_intake); ?></strong></li>
                    <?php
                        }
                    ?>
                  </ul> 
                </div>
                <div class = "intake">
                    <br><h3>Diploma intake:</h3><br>
                    <ul class="course-intake" style="line-height:2.0em;">
                    <?php
                        foreach ($diploma_intakes as $diploma_intake) {
                    ?>
                        <li><strong><i class="fa-solid fa-paper-plane"></i>&nbsp &nbsp<?php echo trim($diploma_intake); ?></strong></li>
                    <?php
                        }
                    ?>
                  </ul> 
                </div>
                <div class = "intake">
                    <br><h3>Degree intake:</h3><br>
                    <ul class="course-intake" style="line-height:2.0em;">
                    <?php
                        foreach ($degree_intakes as $degree_intake) {
                    ?>
                        <li><strong><i class="fa-solid fa-paper-plane"></i>&nbsp &nbsp<?php echo trim($degree_intake); ?></strong></li>
                    <?php
                        }
                    ?>
                  </ul> 
                </div>
            </div>
    
    <div class = "displayBox">
        <h2>Explore courses</h2>
        <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
          <div id="courseContainer">
            <a href="course_details.php?course_id=<?php echo $row2['course_id']; ?>">
            <p><?php echo $row2["course_name"];  ?></p>
            </a>
          </div>
        <?php }?>
    </div>

    <div class = "displayBox" style="background-color:white;">
        <h2><i class='fa-sharp fa-solid fa-location-dot fa-bounce'></i> Location: <?php echo $row["location"]; ?> </h2>
        <h2>Map <i class="fa-sharp fa-solid fa-map"></i> :</h2><br><br>
        <div id="map" style="border-radius:10px;"><script>
          function initMap() {
            var myLatLng = { lat: <?php echo $row["latitude"]; ?>, lng: <?php echo $row["longitude"]; ?> };

            var map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 18
            });

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: '<?php echo $row["university_name"]; ?>'
            });
          }
        </script></div>
    </div>
    <?php
    }?>
    <h2 id="kInfo">Event and Activities</h2>
    <div class="slideshow-container">
    
    <div class="mySlides fade">
      <!-- <div class="numbertext">1 / 3</div> -->
      <img src="images/liveConcert.jpg" style="width:100%">
      <div class="text">Page 1</div>
    </div>
    
    <div class="mySlides fade">
      <!-- <div class="numbertext">2 / 3</div> -->
      
      <img src="images/sportEvent.jpg" style="width:100%">
      <div class="text">Page 2</div>
    </div>
    
    <div class="mySlides fade">
      <!-- <div class="numbertext">3 / 3</div> -->
      
      <img src="images/movieNight.jpg" style="width:100%">
      <div class="text">Page 3</div>
    </div>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>

    <script>
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>


    <?php
    include "footer.php";
    ?>


</body>
</html>