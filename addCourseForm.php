<!-- Programmer Name: Tan Zu Seng
Program Name: addCourseForm.php
Description: Add New Course
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php 
    include "header.php";
    include "dbConn.php";

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $universityId = $_POST["university_id"];
        $courseName = $_POST["course_name"];
        $courseLevel = $_POST["course_level"];
        $courseCategory = $_POST["course_category"];
        $duration = $_POST["duration"];
        $intake = $_POST["intake"];
        $fees = $_POST["fees"];
        $courseContent = $_POST["course_content"];
      
        // Prepare and execute the SQL query to insert data into the table
        $query = "INSERT INTO course_t (course_id, course_name, course_category, course_level, duration, intake, fees, course_content, university_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bind_param("sssisssi", $courseName, $courseCategory, $courseLevel, $duration, $intake, $fees, $courseContent, $universityId);
        $statement->execute();
      
        // Check if the query was successful
        if ($statement->affected_rows > 0) {
          // Success message
          $message = "Course added successfully.";
          echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'manageCourses.php';
                });
            });
        </script>";
        } else {
          // Error message
          $message = "Failed to add course.";
        }
      }
      
      // Retrieve universities from the database
      $query = "SELECT university_id, university_name FROM university_t";
      $result = $connection->query($query);
      $universities = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addCourseForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">



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

<div class="modal">
<form class="form" method="POST">
  <h1 style="text-align:center;">Add New Course</h1>
  <div class="course-info--form">

  <div class="input_container">
      <label for="university_field" class="input_label">University</label>
      <select id="university_field" name="university_id" class="input_field">
        <option value="">Select University</option>
        <?php foreach ($universities as $university) : ?>
          <option value="<?php echo $university['university_id']; ?>"><?php echo $university['university_name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Course Name</label>
      <input id="password_field" class="input_field" type="text" name="course_name" title="Inpit Title" placeholder="Enter Full Course Name">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Course Level</label>
      <select name="course_level" class="input_field">
            <option value="">Please Select the Course Level</option>
            <option>Foundation</option>
            <option>Diploma</option>
            <option>Degree</option>
      </select>
    </div>
      
    <div class="input_container">
      <label for="password_field" class="input_label">Course Category</label>
      <select name="course_category" class="input_field">
            <option value=" ">Please Select the Course Category</option>
            <option>Accounting</option>
            <option>Architecture</option>
            <option>Business</option>
            <option>Mass Comm</option>
            <option>Art</option>
            <option>Engineering</option>
            <option>Information Technology</option>
            <option>Law</option>
            <option>Medical</option>
      </select>
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Duration</label>
      <input id="password_field" class="input_field" type="number" name="duration" title="Inpit Title" placeholder="Enter Full Course Duration">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Intake</label>
      <input id="password_field" class="input_field" type="text" name="intake" title="Inpit Title" placeholder="Enter Intake of Course">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Tuition Fees</label>
      <input id="password_field" class="input_field" type="currency" currency="MYR" name="fees" title="Inpit Title" placeholder="Total Tuition Fees">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Course Content</label>
      <textarea name="course_content" class="content_field" cols="30" rows="20"></textarea>
    </div>
    <br>
    <div class="btn-container">
        <button type="submit" class='btn'>Add Course</button>
    </div>
    <div id="message-container"></div>
        </div>
  </form>
        </div>
    <script>
    $(document).ready(function() {
        $(".btn").on("click", function(e) {
            e.preventDefault();
            var btn = $(this);
            var messageContainer = $("#message-container");

            if (!btn.hasClass("btn-progress") && !btn.hasClass("btn-complete")) {
                btn.addClass("btn-progress");
                btn.attr("disabled", true);

                setTimeout(function() {
                    btn.addClass("btn-fill");
                }, 500);

                setTimeout(function() {
                    btn.removeClass("btn-fill");
                }, 4100);

                setTimeout(function() {
                    btn.addClass("btn-complete");
                    btn.attr("disabled", false);

                    messageContainer.fadeIn(1500);

                    $("html, body").animate({ scrollTop: $(document).height() }, 2000);

                    // Submit the form using AJAX
                    $.ajax({
                        type: "POST",
                        url: "addCourseForm.php",
                        data: btn.closest("form").serialize(),
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'New course has been added successfully',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = 'manageCourses.php';
                            });
                        },
                        error: function() {
                            // Handle error if the course was not added successfully
                            messageContainer.text("Failed to add course.").fadeIn(1500);
                            btn.removeClass("btn-progress btn-complete").attr("disabled", false);
                        }
                    });
                }, 4100);
            }
        });
    });
</script>
</body>
<?php
  include "footer.php";
?>
</html>
