<!-- Programmer Name: Tan Zu Seng
Program Name: courseLists.php
Description: Course Lists
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";

$category = $_GET['category'];

if ($category === 'all') {
    // Fetch all courses
    $sql1 = "SELECT * FROM course_t WHERE course_level IN ('Foundation', 'Diploma')";
    $sql2 = "SELECT * FROM course_t WHERE course_level = 'Degree'";
} else {
    // Fetch courses based on the selected category
    $sql1 = "SELECT * FROM course_t WHERE course_level IN ('Foundation', 'Diploma') AND course_category = '$category'";
    $sql2 = "SELECT * FROM course_t WHERE course_level = 'Degree' AND course_category = '$category'";
}

$foundation_course = $connection->query($sql1);
$degree_course = $connection->query($sql2);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="courseLists.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">


    <title>Course Lists</title>
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
    <div class="hero">
        <div class="container">
            <div class="box">
                <div class="title">
                    <span class="block"></span>
                    <h1>Getting The Right Courses For Yourself<span></span></h1>
                </div>

                <div class="role">
                    <div class="block"></div>
                    <p>Explore and understand the majority of courses you can choose to study locally for Pre-university, Diploma & Degree</p>
                </div>
            </div>
            </div>
        <div class="flexbox">
            <div class="search">
                <div class="search-header">
                <h1>Search Courses</h1>
                </div>  
                <div class="search-input">
                <input type="text" id="searchInput" placeholder="Search . . ." required onkeyup="searchCourses()">
                </div>
            </div>
        </div>

        <div class="btn-box">
            <button id="btn1" onclick="openFoundation()"><i class="fa fa-solid fa-book"></i>Foundation / Diploma</button>
            <button id="btn2" onclick="openDegree()"><i class="fa fa-solid fa-graduation-cap"></i>Degree</button>
        </div>
        <div id="content1" class="content" style="transform: translateX(0px);">
                <br>
                <h2>&nbsp Foundation / Diploma</h2>
                <?php
                while($row = mysqli_fetch_assoc($foundation_course)){
                    $university_id = $row['university_id'];
                    $university_query = "SELECT * FROM university_t WHERE university_id = '$university_id'";
                    $university_result = $connection->query($university_query);
                    $university_row = mysqli_fetch_assoc($university_result);
                    $intakes = explode(',', $row['intake']);
                ?>	
                <a href="course_details.php?course_id=<?php echo $row['course_id']; ?>">
                <div id="container">

                    <div class="product-image">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($university_row['logo'] ).'" alt="University Logo">'; ?>
        
                    <div class="info">
                        <h3>Intake</h3>
                        <ul>
                            <?php
                                foreach ($intakes as $intake) {
                            ?>
                                <li><strong><?php echo trim($intake); ?></strong></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    </div>

                    <div class="product-details">
                    <h1><?php echo $row ["course_name"]; ?></h1>
                        <br>
                        <br>
                        <p class="information"><i class="fa-sharp fa-solid fa-location-dot fa-bounce"></i>&nbsp <?php echo $university_row['location']; ?></p>
                        <p class="extra-details" style="color:brown;font-size:18px;margin-top:25px;margin-left:30px;"><i class="fa-solid fa-list"></i>&nbsp Entry Requirements &nbsp &nbsp &nbsp <i class="fa fa-light fa-award"></i>&nbsp Scholarship</p>
                        <h2><i class="fa fa-duotone fa-sack-dollar"></i>&nbsp Total Fees: RM <?php echo $row ["fees"]; ?></h2> 
                    </div>

                </div>
            <?php
                }
            ?>
        </div>

        <div id="content2" class="content">
                <br>
                <h2>&nbsp Bachelor's Degree</h2>
                <?php
                    while($row = mysqli_fetch_assoc($degree_course)){
                        $university_id = $row['university_id'];
                        $university_query = "SELECT * FROM university_t WHERE university_id = '$university_id'";
                        $university_result = $connection->query($university_query);
                        $university_row = mysqli_fetch_assoc($university_result);
                        $intakes = explode(',', $row['intake']);

                ?>	
                <a href="course_details.php?course_id=<?php echo $row['course_id']; ?>">
                <div id="container">	
                    <div class="product-image">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($university_row['logo'] ).'" alt="University Logo">'; ?>
                    <div class="info">
                        <h3>Intake</h3>
                        <ul>
                            <?php
                                foreach ($intakes as $intake) {
                            ?>
                                <li><strong><?php echo trim($intake); ?></strong></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    </div>

                    <div class="product-details">
                    <h1><?php echo $row ["course_name"]; ?></h1>
                        <br>
                        <p class="information"><i class="fa-sharp fa-solid fa-location-dot fa-bounce"></i>&nbsp <?php echo $university_row['location']; ?></p>
                        <p class="extra-details" style="color:brown;font-size:18px;margin-top:25px;margin-left:30px;"><i class="fa-solid fa-list"></i>&nbsp Entry Requirements &nbsp &nbsp &nbsp <i class="fa fa-light fa-award"></i>&nbsp Scholarship</p>
                        <h2><i class="fa fa-duotone fa-sack-dollar"></i>&nbsp Total Fees: RM <?php echo $row ["fees"]; ?></h2> 
                    </div>
                </div>
            <?php
                }
            ?>
    </div>
    <script>
        var content1 = document.getElementById("content1");
        var content2 = document.getElementById("content2");
        var btn1 = document.getElementById("btn1");
        var btn2 = document.getElementById("btn2");

        function openFoundation(){
            content1.style.transform = "translateX(0)";
            content2.style.transform = "translateX(100%)"
            btn1.style.color = "#ff7846";
            btn2.style.color = "#000";
            // content1.style.transitionDelay = "0.3s";
            // content2.style.transitionDelay = "0s";
            content1.style.display = "block";
            content2.style.display = "none";
        }


        function openDegree(){
            content1.style.transform = "translateX(100%)";
            content2.style.transform = "translateX(0)"
            btn2.style.color = "#ff7846";
            btn1.style.color = "#000";
            // content1.style.transitionDelay = "0s";
            // content2.style.transitionDelay = "0.3s";
            content2.style.display = "block";
            content1.style.display = "none";
        }

        // function openDegree(){
        //     content1.style.transform = "translateX(100%)";
        //     content2.style.transform = "translateX(0)"
        //     btn2.style.color = "#ff7846";
        //     btn1.style.color = "#000";
        //     content1.style.transitionDelay = "0s";
        //     content2.style.transitionDelay = "0.3s";
        //     content2.style.display = "block";
        //     content1.style.display = "none";
        // }

        function searchCourses() {
        // Get the search input value
        var searchValue = document.getElementById("searchInput").value.toLowerCase();

        // Get all the course names
        var courseNames = document.querySelectorAll(".product-details h1");

        // Loop through each course name
        for (var i = 0; i < courseNames.length; i++) {
            var courseName = courseNames[i].innerText.toLowerCase();
            var courseContainer = courseNames[i].closest("#container");

            // Check if the course name contains the search value
            if (courseName.includes(searchValue)) {
            courseContainer.style.display = "block";
            } else {
            courseContainer.style.display = "none";
            }
        }
        }

    </script>

</body>
<?php
  include "footer.php";
?>
</html>
