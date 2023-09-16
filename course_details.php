<!-- Programmer Name: Tan Zu Seng
Program Name: course_details.php
Description: Course Details
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";

// Check if the course ID is provided in the URL
if (isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];

    // Retrieve the course details based on the provided course ID
    $sql = "SELECT * FROM course_t WHERE course_id = '$courseId'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
    // Course details found
    $course = $result->fetch_assoc();
    // Display the course details on the page   
    // ...
    $courseContent = $course["course_content"];

    // Split the course content into separate lines
    $lines = explode("\n", $courseContent);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <link rel="stylesheet" href="course_details.css">
    <title>Course Details</title>
    <style>
    html { 
        /* background: url(images/mainbg.png) no-repeat center center fixed;  */
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
    <div id="course-details">
        <?php
            $university_id = $course['university_id'];
            $university_query = "SELECT * FROM university_t WHERE university_id = '$university_id'";
            $university_result = $connection->query($university_query);
            $university_row = mysqli_fetch_assoc($university_result);
            $intakes = explode(',', $course['intake']);

        ?>
        <div id="container">
                    <div class="product-image">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($university_row['logo'] ).'" alt="University Logo">'; ?>
                    </div>

                    <div class="product-details">
                        <h1><?php echo $university_row['university_name']?></h1>
                        <p class="extra-details" style="color:black;font-size:16px;margin-left:20px;"><i class="fa-solid fa-list"></i>&nbsp <?php echo $university_row['location']?></p>
                        <h3 class="information"><?php echo $course["course_name"]?></h3>
                        <?php if(isset($_SESSION['userloggedIn'])):?>
                            <a href="apply.php"><button>APPLY NOW</button></a>
                        <?php else: ?>
                            <a href="login.php"><button>APPLY NOW</button></a>
                        <?php endif; ?>

                    </div>
        </div>

        <div class="tabs">
        
        <input type="radio" id="tab1" name="tab-control" checked>
        <input type="radio" id="tab2" name="tab-control">
        <input type="radio" id="tab3" name="tab-control">  
        <input type="radio" id="tab4" name="tab-control">
        <ul>
            <li title="Details"><label for="tab1" role="button">
                <svg viewBox="0 0 24 24"><path d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z"/>
        </svg><br><span>Details</span></label></li>
            <li title="Course Contents"><label for="tab2" role="button">
                <svg viewBox="0 0 24 24"><path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
        </svg><br><span>Course Contents</span></label></li>
            <li title="Intake"><label for="tab3" role="button">
                <svg viewBox="0 0 24 24">
            <path d="M22.833 10.117L16.937 7.24c-.07-.035-.106-.106-.142-.177l-2.912-5.896c-.498-1.03-1.776-1.457-2.807-.96a2.09 2.09 0 0 0-.959.96L7.205 7.063a.81.81 0 0 1-.142.177l-5.896 2.913c-1.03.497-1.457 1.776-.96 2.806a2.1 2.1 0 0 0 .96.96l5.896 2.876c.07.036.106.107.142.142l2.948 5.896c.497 1.03 1.776 1.457 2.806.96a2.09 2.09 0 0 0 .959-.96l2.877-5.896c.036-.07.107-.142.142-.142l5.896-2.912c1.03-.498 1.457-1.776.96-2.806-.178-.427-.533-.746-.96-.96zm-4.368.427l-2.735 2.38c-.533.497-.924 1.136-1.066 1.847l-.71 3.551c-.036.143-.178.25-.32.214-.071 0-.107-.036-.142-.107l-2.38-2.735c-.497-.533-1.137-.923-1.847-1.066l-3.552-.71c-.142-.035-.249-.178-.213-.32 0-.07.035-.106.106-.142l2.735-2.38c.533-.497.924-1.136 1.066-1.847l.71-3.551c.036-.143.178-.25.32-.214a.27.27 0 0 1 .142.071l2.38 2.735c.497.533 1.137.924 1.847 1.066l3.552.71c.142.036.249.178.213.32a.38.38 0 0 1-.106.178z" />
        </svg><br><span>Intake</span></label></li>    
            <li title="Fees"><label for="tab4" role="button">
                <svg viewBox="0 0 24 24">
            <path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
        </svg><br><span>Fees</span></label></li>
        </ul>
        
        <div class="slider"><div class="indicator"></div></div>
        <div class="content" style="height:100%;">
            <section>
                <h3>Duration: &nbsp <?php echo $course["duration"]?> years</h3>
                <br>
                <h3>Course Level: &nbsp <?php echo $course["course_level"]?></h3>
                <br>
                <h3>Course Category: &nbsp <?php echo $course["course_category"]?></h3>
                <br>
                <h3>Award: &nbsp <?php echo $university_row['university_name']?></h3>
                <br>
            </section>

            <section>
                <h1>Course Contents</h1>
                <?php
                $displayContent = false;
                $semesterList = array();

                // Loop through the lines and store the content for each semester in an array
                foreach ($lines as $line) {
                    // Trim any leading/trailing whitespace
                    $trimmedLine = trim($line);

                    // Check if the line starts with "Semester"
                    if (strpos($trimmedLine, "Semester") === 0 || strpos($trimmedLine, "Level") === 0 ) {
                        // Check if the semester list is not empty
                        if (!empty($semesterList)) {
                            // Display the content for the previous semester
                            echo "<ol class='alternating-colors'>";
                            echo "<li>" . implode("</li>\n<li>", $semesterList) . "</li>";
                            echo "</ol><br><br>";
                            
                            // Clear the semester list
                            $semesterList = array();
                        }
                        
                        // Display the semester heading
                        echo "<br><h2>" . $trimmedLine . "</h2>";
                        
                        // Check if the line starts with "Semester 1" or "Semester 2" or "Semester 3"
                        if (strpos($trimmedLine, "Semester 1") === 0 || strpos($trimmedLine, "Semester 2") === 0 || 
                        strpos($trimmedLine, "Semester 3") === 0 || strpos($trimmedLine, "Semester 4")=== 0 ||
                         strpos($trimmedLine, "Semester 5")=== 0 || strpos($trimmedLine, "Semester 6")=== 0 ||
                        strpos($trimmedLine, "Semester 7")=== 0 || strpos($trimmedLine, "Level 1") === 0 || 
                        strpos($trimmedLine, "Level 2") === 0 || strpos($trimmedLine, "Level 3") === 0 || 
                        strpos($trimmedLine, "Level 4") === 0 || strpos($trimmedLine, "Level 5") === 0) {
                            // Start storing the content for the current semester
                            $displayContent = true;
                        } else {
                            // Stop storing the content for the current semester
                            $displayContent = false;
                        }
                    } elseif ($displayContent) {
                        // Store the content in the semester list
                        $semesterList[] = $trimmedLine;
                    }
                }
                
                // Display the content for the last semester
                if (!empty($semesterList)) {
                    echo "<ol class='alternating-colors'>";
                    echo "<li>" . implode("</li>\n<li>", $semesterList) . "</li>";
                    echo "</ol>";
                }
                ?>
            </section>

            <section>
                <h1>Intake</h1>
                <ul class="intake">
                    <?php
                        foreach ($intakes as $intake) {
                    ?>
                        <li><button><strong><?php echo trim($intake); ?></strong></button></li>
                    <?php
                        }
                    ?>
                </ul>
            </section>

            <section>
                <h1>Fees</h1>
                <h3>Tuition Fees: RM <?php echo $course["fees"]?></h3>
            </section>
        </div>
        </div>
    </div>
    <?php
        } else {
            // Course details not found
            echo "Course not found.";
        }
    } else {
        // Course ID not provided
        echo "Invalid course ID.";
    }
?>
</body>

</html>
<?php
  include "footer.php";
?>


