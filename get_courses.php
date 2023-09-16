<?php
include 'dbConn.php';

if (isset($_GET['universityId'])) {
   $selectedUniversity = $_GET['universityId'];

   // Fetch courses for the selected university from the database and populate the dropdown
   $courseQuery = "SELECT * FROM course_t WHERE university_id = $selectedUniversity";
   $courseResult = mysqli_query($connection, $courseQuery);
   $output = '';
   while ($row = mysqli_fetch_assoc($courseResult)) {
      $selected = ($row['course_name'] == $course_name) ? 'selected' : '';
      $output .= '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
   }
   echo $output;
}

mysqli_close($connection);
?>
