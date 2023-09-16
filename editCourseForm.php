<!-- Programmer Name: Tan Zu Seng
Program Name: editCourseForm.php
Description: Edit Course Details
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";

if (isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];

    $sql = "SELECT * FROM course_t WHERE course_id = '$courseId'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Course details found
        $course = $result->fetch_assoc();

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Update logic here
            // Retrieve form field values
            $courseName = $_POST['course_name'];
            $courseLevel = $_POST['course_level'];
            $courseCategory = $_POST['course_category'];
            $duration = $_POST['duration'];
            $intake = $_POST['intake'];
            $fees = $_POST['fees'];
            $courseContent = $_POST['course_content'];

            // Perform database update
            $updateSql = "UPDATE course_t SET course_name = '$courseName', course_level = '$courseLevel', course_category = '$courseCategory', duration = '$duration', intake = '$intake', fees = '$fees', course_content = '$courseContent' WHERE course_id = '$courseId'";
            $updateResult = $connection->query($updateSql);

            if ($updateResult) { 
                $response = array(
                    'success' => true,
                    'message' => 'Course updated successfully.'
                );
                echo json_encode($response);
                exit;
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error updating course: ' . $connection->error
                );
                echo json_encode($response);
                exit;
            }
        } else if (isset($_POST['delete'])) {
            // Delete logic here
            $deleteSql = "DELETE FROM course_t WHERE course_id = '$courseId'";
            $deleteResult = $connection->query($deleteSql);

            if ($deleteResult) {
                echo '<script>alert("Course Data Has Been Deleted Successfully !!!")</script>';
                echo '<script>window.location.href = "manageCourses.php";</script>';
            } else {
                echo "Error deleting course: " . $connection->error;
            }
        } else {
            // Assign the initial record values to variables
            $updatedCourseName = $course['course_name'];
            $updatedCourseLevel = $course['course_level'];
            $updatedCourseCategory = $course['course_category'];
            $updatedDuration = $course['duration'];
            $updatedIntake = $course['intake'];
            $updatedFees = $course['fees'];
            $updatedCourseContent = $course['course_content'];
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editCourseForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">

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
    <?php
        
        $university_id = $course['university_id'];
        $university_query = "SELECT * FROM university_t WHERE university_id = '$university_id'";
        $university_result = $connection->query($university_query);
        $university_row = mysqli_fetch_assoc($university_result);
    ?>

<div class="modal">
<form id="updateCourseForm" class="form" method="POST">
  <h1 style="text-align:center;">Edit Course</h1>
  <div class="course-info--form">
    <div class="input_container">
      <label for="password_field" class="input_label">Course ID</label>
      <input id="password_field" class="input_field" type="text" name="course_id" title="Course ID" placeholder="Course ID Cannot Be Modify" 
      value="<?php echo $course['course_id']?>"readonly>
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">University Name</label>
      <input id="password_field" class="input_field" type="text" name="university_name" title="University Name" placeholder="Cannot Change Uni Name"
      value="<?php echo $university_row['university_name']?>"readonly>
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Course Name</label>
      <input id="password_field" class="input_field" type="text" name="course_name" title="Course Name" placeholder="Enter Full Course Name"
      value="<?php echo $updatedCourseName ?>">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Course Level</label>
      <select name="course_level" class="input_field">
            <option value="">Please Select the Course Level</option>
            <option <?php if ('Foundation'== $updatedCourseLevel) echo 'selected = "selected"'?>>Foundation</option>
            <option <?php if ('Diploma'== $updatedCourseLevel) echo 'selected = "selected"'?>>Diploma</option>
            <option <?php if ('Degree'== $updatedCourseLevel) echo 'selected = "selected"'?>>Degree</option>
      </select>
    </div>
      
    <div class="input_container">
      <label for="password_field" class="input_label">Course Category</label>
      <select name="course_category" class="input_field">
            <option value=" ">Please Select the Course Category</option>
            <option <?php if ('Accounting'== $updatedCourseCategory) echo 'selected = "selected"'?>>Accounting</option>
            <option <?php if ('Architecture'== $updatedCourseCategory) echo 'selected = "selected"'?>>Architecture</option>
            <option <?php if ('Business'== $updatedCourseCategory) echo 'selected = "selected"'?>>Business</option>
            <option <?php if ('Mass Comm'== $updatedCourseCategory) echo 'selected = "selected"'?>>Mass Comm</option>
            <option <?php if ('Art'== $updatedCourseCategory) echo 'selected = "selected"'?>>Art</option>
            <option <?php if ('Engineering'== $updatedCourseCategory) echo 'selected = "selected"'?>>Engineering</option>
            <option <?php if ('Information Technology'== $updatedCourseCategory) echo 'selected = "selected"'?>>Information Technology</option>
            <option <?php if ('Law'== $updatedCourseCategory) echo 'selected = "selected"'?>>Law</option>
            <option <?php if ('Medical'== $updatedCourseCategory) echo 'selected = "selected"'?>>Medical</option>
      </select>
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Duration</label>
      <input id="password_field" class="input_field" type="number" name="duration" title="Duration of Study" placeholder="Enter Full Course Duration"
      value="<?php echo $updatedDuration ?>">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Intake</label>
      <input id="password_field" class="input_field" type="text" name="intake" title="Intake" placeholder="Enter Intake of Course"
      value="<?php echo $updatedIntake ?>">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Tuition Fees</label>
      <input id="password_field" class="input_field" type="currency" currency="MYR" name="fees" title="Tuition Fees" placeholder="Total Tuition Fees"
      value="<?php echo $updatedFees ?>">
    </div>

    <div class="input_container">
      <label for="password_field" class="input_label">Course Content</label>
      <textarea name="course_content" class="content_field" cols="30" rows="20"><?php echo $updatedCourseContent ?></textarea>
    </div>
    <br>
    <div class="btn-box">
        <button class="update--btn" type="submit" name="update">Update</button>       
        <a href="manageCourses.php"><button class="delete--btn" type="button" name="delete">Cancel</button></a>
    </div>
    <!-- onclick="submitForm(event)" -->

  </div>
</form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Get a reference to the form
  const form = document.getElementById('updateCourseForm');

  // Add a submit event listener to the form
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create a new FormData object to store the form data
    const formData = new FormData(form);

    // Make an AJAX request to update the course
    fetch('', {
      method: 'POST',
      body: formData
    })
    .then(function(response) {
      return response.json(); // Parse the JSON response
    })
    .then(function(data) {
      if (data.success) {
        // Display Swal.fire alert on success
        Swal.fire({
          title: 'Update Successful!',
          text: 'Course Updated',
          icon: 'success',
          confirmButtonText: 'Back to Home'
        }).then(function() {
          window.location.href = 'manageCourses.php';
        });
      } else {
        // Display error message if update failed
        Swal.fire({
          title: 'Error',
          text: data.message,
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }
    })
    .catch(function(error) {
      // Display error message if an error occurred
      Swal.fire({
        title: 'Update Successful!',
        text: 'Course Updated Successfully.',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then(function() {
          window.location.href = 'manageCourses.php';
        });
    });
  });
});
</script>

</body>
<?php
  include "footer.php";
?>
</html>

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
