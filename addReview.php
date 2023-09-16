<!-- Programmer Name: Tay Wei Qin
Program Name: addReview.php
Description: Add Alumni Review
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php 
include 'dbConn.php';
include 'header.php';

if (!empty($_SESSION['admin_id'])) {
   $query = "SELECT * FROM admin_t WHERE admin_id = " . $_SESSION['admin_id'];
   $results = mysqli_query($connection, $query);
   $row = mysqli_fetch_assoc($results);
   $count = mysqli_num_rows($results);
   if ($count == 1) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="addReview.css">
  <title>Edu Advisor</title>
  <link rel="shortcut icon" href="images/EduAdvisor.png">

</head>

<body>
<form action="#" method="post" enctype="multipart/form-data">
<div class="container">
    <img src="https://images.unsplash.com/photo-1517971071642-34a2d3ecc9cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=388&q=8" alt="image">
    <div class="container-text">
      <h2>Add Alumni Review <br>Authorized for Admin</h2>
      <input type="text" name="txtName" placeholder="Alumni Name" required>
      <input type="text" name="txtOrganization" placeholder="Current Organization" required>
      <input type="text" name="txtUni" placeholder="Graduated University Name" required>
      <input type="text" name="txtCourse" placeholder="Course Name" required>
      <input type="text" name="txtReview" placeholder="Review/Comment" required>
      <input type="file" name="image" accept=".png, .jpg, .jpeg, .pdf" required>
      <button type="submit" name="submit">Submit</button>
    </div>
  </div>
</form>
</body>
</html>

<?php
   }
}

if (isset($_POST['submit'])) {
    $alumni_name = mysqli_real_escape_string($connection, $_POST['txtName']);
    $current_organization = mysqli_real_escape_string($connection, $_POST['txtOrganization']);
    $university_name = mysqli_real_escape_string($connection, $_POST['txtUni']);
    $course_name = mysqli_real_escape_string($connection, $_POST['txtCourse']);
    $review = mysqli_real_escape_string($connection, $_POST['txtReview']);
    $photo = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($photo)); 

    $query = "INSERT INTO `alumni_t` (`alumni_name`, `current_organization`, `university_name`, `course_name`, `review`, `photo`) 
              VALUES ('$alumni_name', '$current_organization', '$university_name', '$course_name', '$review', '$imgContent')";

    if (mysqli_query($connection, $query)) {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
      echo "<script>";
      echo "Swal.fire({";
      echo "    title: 'Review Submitted!',";
      echo "    text: 'Review Updated Successfully',";
      echo "    icon: 'success',";
      echo "    confirmButtonText: 'Back to Home'";
      echo "}).then(function() {";
      echo "    window.location.href = 'AdminPage.php';";
      echo "});";
      echo "</script>";   
    } else {
       echo 'Sorry, something went wrong. Please try again.';   
    }
}

mysqli_close($connection);
include "footer.php";
?>
