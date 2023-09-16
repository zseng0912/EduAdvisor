<!-- Programmer Name: Tay Wei Qin
Program Name: apply.php
Description: Apply University
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php 
include 'dbConn.php';
include 'header.php';
//load the data to the form

if (!empty($_SESSION['user_id'])){
   // echo 'User has logged in';
   $query = "SELECT * FROM user_t WHERE user_id = " . $_SESSION['user_id'] ;
   $results = mysqli_query($connection, $query);
   $row1 = mysqli_fetch_assoc($results);
   $count = mysqli_num_rows($results);
   if ($count == 1) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="apply.css">
  <title>Edu Advisor</title>
  <link rel="shortcut icon" href="images/EduAdvisor.png">
<style>
    html { 
        background: url(images/apply.jpg) no-repeat center center fixed; 
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
        <div class="container">
      <div class="text">
         University Application Form
      </div>
      <form action="#" method="post" enctype="multipart/form-data">
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="txtName" required>
               <div class="underline"></div>
               <label for="">Applicant Name</label>
            </div>
            <div class="input-data">
               <input type="text" name="txtIC" required>
               <div class="underline"></div>
               <label for="">Identity Card Number</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="txtContact" required>
               <div class="underline"></div>
               <label for="">Contact Number</label>
            </div>
            <div class="input-data">
               <input type="text" name="txtEmail" required>
               <div class="underline"></div>
               <label for="">Email</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
                  <!-- <input type="text" name="txtUni" required>
                  <div class="underline"></div> -->
                  <label for="">University Name</label>
                  <div style="margin-top:30px;">
                  <select name="txtUni" id="txtUni" style="margin-top:3px;width:360px;height:30px;" onchange="fetchCourses()">
                  <?php
                        // Fetch universities from the database and populate the dropdown
                        $universityQuery = "SELECT * FROM university_t";
                        $universityResult = mysqli_query($connection, $universityQuery);
                        while ($row = mysqli_fetch_assoc($universityResult)) {
                           $selected = ($row['university_name'] == $university_name) ? 'selected' : '';
                           echo '<option value="'.$row['university_id'].'">'.$row['university_name'].'</option>';
                        }
                     ?>
                  </select>
                  </div>
               </div>
               <div class="input-data">
               <label for="txtCourse">Course</label>
               <div style="margin-top:30px;">
               <select name="txtCourse" id="txtCourse" style="margin-top:3px;width:360px;height:30px;">

               </select>
               </div>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <label for="">Insert photo</label><br><br>
               <input type="file" name="image" accept=".png, .jpg, .jpeg, .pdf" required>
            </div>
            <div class="input-data">
               <label for="">Insert Result Slip</label><br><br>
               <input type="file" name="image" accept=".png, .jpg, .jpeg, .pdf" required>
            </div>
         </div>
         <br>
         <div class="form-row">
                <div class="input-data">
        <select name="txtScholarship">
            <option value="">Choose Scholarship</option><br>
            <option value="SPM">SPM</option>
            <option value="STPM">STPM</option>
            <option value="A-Levels">A-Levels</option>
            <option value="Foundation / Diploma">Foundation / Diploma</option>
            <option value="Matriculation">Matriculation</option>
            <option value="IGCSE">IGCSE</option>
            <option value="UEC">UEC</option>
            <option value="Government">Government</option>
            <option value="PTPTN">PTPTN</option>
        </select>
        <div class="underline"></div>
        </div>
            <div class="input-data">
               <input type="text" name="txtid" value="<?php echo $row1['user_id']; ?>" readonly>
               <div class="underline"></div>
               <label for="" style="margin-bottom:20px;">User ID</label>
            </div>
         </div>
         <div class="input-data">
         <input type="submit" value="submit" name="submit">
      </form>
      </div>
   </div>
</body>
<script>
function fetchCourses() {
  var universityId = document.getElementById("txtUni").value;
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_courses.php?universityId=" + universityId, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var courseDropdown = document.getElementById("txtCourse");
      courseDropdown.innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}
</script>

</html>

<?php
   }
} else {
   header('Location: userProfile.php');
}

if (isset($_POST['submit'])) {
   $user_id = $_POST['txtid']; 
   $applicant_name = $_POST['txtName'];
   $ic_number = $_POST['txtIC'];
   $contact_number = $_POST['txtContact'];
   $email = $_POST['txtEmail'];
   $course_name = $_POST['txtCourse'];
   $university_name = $_POST['txtUni'];
   $photo = $_FILES['image']['tmp_name'];
   $imgContent = addslashes(file_get_contents($photo)); 
   $result_slip = $_FILES['image']['tmp_name'];
   $slipContent = addslashes(file_get_contents($result_slip)); 
   $scholarship_category = $_POST['txtScholarship'];
   $status = 'pending';

   $universityQuery = "SELECT university_name FROM university_t WHERE university_id = '$university_name'";
   $universityResult = mysqli_query($connection, $universityQuery);
   $universityRow = mysqli_fetch_assoc($universityResult);
   $university_id = $universityRow['university_name'];

   $courseQuery = "SELECT course_name FROM course_t WHERE course_id = '$course_name' AND university_id = '$university_name'";
   $courseResult = mysqli_query($connection, $courseQuery);
   $courseRow = mysqli_fetch_assoc($courseResult);
   $course_id = $courseRow['course_name'];

   $query = "INSERT INTO `application_t`(`user_id`,`applicant_name`, `ic_number`, `contact_number`,`email`, 
   `course_name`, `university_name`, `photo`, `result_slip`, `scholarship_category`,`status`) 
   VALUES ('$user_id','$applicant_name','$ic_number','$contact_number','$email','$course_id','$university_id',
   '$imgContent', '$slipContent','$scholarship_category','$status')";
   if (mysqli_query($connection, $query)) {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
      echo "<script>";
      echo "Swal.fire({";
      echo "    title: 'Application Submitted!',";
      echo "    text: 'Wait for approval',";
      echo "    icon: 'success',";
      echo "    confirmButtonText: 'Back to Home'";
      echo "}).then(function() {";
      echo "    window.location.href = 'index.php';";
      echo "});";
      echo "</script>";   } else {
       echo 'Sorry, something went wrong. Please try again.';
   }
}
mysqli_close($connection);

include "footer.php";
?>