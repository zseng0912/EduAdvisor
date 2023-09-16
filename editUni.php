<!-- Programmer Name: Tang Jin Xun
Program Name: editUni.php
Description: Edit University
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";

// Check if university ID is provided
if (isset($_GET['id'])) {
    $uniID = $_GET['id'];

    // Retrieve university details from the database
    $sql = "SELECT * FROM university_t WHERE university_id = '$uniID'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $uni = $result->fetch_assoc(); // Fetch university details

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Update logic
            if (isset($_POST['update'])) {
                // Retrieve form field values
                $universityName = $_POST['University_name'];
                $location = $_POST['Location'];
                $latitude = $_POST['Latitude'];
                $longitude = $_POST['Longitude'];
                $foundationIntake = $_POST['Foundation_intake'];
                $diplomaIntake = $_POST['Diploma_intake'];
                $degreeIntake = $_POST['Degree_intake'];
                $uniDetail = $_POST['Uni_detail'];

                // Perform database update
                $insert = $connection->query("UPDATE university_t SET `university_name` = '$universityName', `location` = '$location', `latitude` = '$latitude', 
                `longitude` = '$longitude', `foundation_intake` = '$foundationIntake', `diploma_intake` = '$diplomaIntake',
                `degree_intake` = '$degreeIntake', `description` = '$uniDetail' WHERE university_id = '$uniID'");

                if ($insert) {
                  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
                  echo "<script>";
                  echo "Swal.fire({";
                  echo "    title: 'Update Successful!',";
                  echo "    text: 'University Deleted',";
                  echo "    icon: 'success',";
                  echo "    confirmButtonText: 'Back to Home'";
                  echo "}).then(function() {";
                  echo "    window.location.href = 'viewUni.php';";
                  echo "});";
                  echo "</script>";
                } else {
                    echo "Error updating university information: " . $connection->error;
                }
            }

            // Delete logic
            if (isset($_POST['delete'])) {
                $deleteSql = "DELETE FROM university_t WHERE university_id = '$uniID'";
                $deleteResult = $connection->query($deleteSql);

                if ($deleteResult) {
                  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
                  echo "<script>";
                  echo "Swal.fire({";
                  echo "    title: 'Delete Successful!',";
                  echo "    text: 'University Deleted',";
                  echo "    icon: 'success',";
                  echo "    confirmButtonText: 'Back to Home'";
                  echo "}).then(function() {";
                  echo "    window.location.href = 'viewUni.php';";
                  echo "});";
                  echo "</script>";
                } else {
                    echo "Error deleting university information: " . $connection->error;
                }
            }
        }

        // Display the form to update or delete university information
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

    <title>Update University Information</title>
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
<form id="updateUniversityForm" class="form" method="POST">
  <h1 style="text-align:center;">Update University Information</h1>
  <div class="course-info--form">
    <div class="input_container">
      <label for="university_name" class="input_label">University Name</label>
      <input id="university_name" class="input_field" type="text" name="University_name" title="University Name" placeholder="Enter University Name" value="<?php echo $uni['university_name']?>" required>
    </div>

    <div class="input_container">
      <label for="location" class="input_label">Location</label>
      <input id="location" class="input_field" type="text" name="Location" title="Location" placeholder="Enter location" value="<?php echo $uni['location'] ?>" required>
    </div>

    <div class="input_container">
      <label for="latitude" class="input_label">Latitude</label>
      <input id="latitude" class="input_field" type="number" name="Latitude" title="Latitude" placeholder="Enter Latitude" value="<?php echo $uni['latitude'] ?>" required>
    </div>

    <div class="input_container">
      <label for="longitude" class="input_label">Longitude</label>
      <input id="longitude" class="input_field" type="number" name="Longitude" title="Longitude" placeholder="Enter Longitude" value="<?php echo $uni['longitude'] ?>" required>
    </div>

    <div class="input_container">
      <label for="foundation_intake" class="input_label">Foundation intake</label>
      <input id="foundation_intake" class="input_field" type="text" name="Foundation_intake" title="Foundation intake" placeholder="Enter intake" value="<?php echo $uni['foundation_intake'] ?>" required>
    </div>

    <div class="input_container">
      <label for="diploma_intake" class="input_label">Diploma intake</label>
      <input id="diploma_intake" class="input_field" type="text" name="Diploma_intake" title="Diploma intake" placeholder="Enter intake" value="<?php echo $uni['diploma_intake'] ?>" required>
    </div>

    <div class="input_container">
      <label for="degree_intake" class="input_label">Degree intake</label>
      <input id="degree_intake" class="input_field" type="text" name="Degree_intake" title="Degree intake" placeholder="Enter intake" value="<?php echo $uni['degree_intake'] ?>" required>
    </div>

    <div class="input_container">
      <label for="uni_detail" class="input_label">University Description</label>
      <textarea id="uni_detail" class="input_field" name="Uni_detail" cols="30" rows="35" style="height:150px;"><?php echo $uni['description'] ?></textarea>
    </div>

    <!-- <div class="button_container">
      <button type="submit" name="update" class="btn">Update</button>
      <button type="submit" name="delete" class="btn">Delete</button>
    </div> -->
    <div class="btn-box">
        <button class="update--btn" type="submit" name="update">Update</button>       
        <button class="delete--btn" type="submit" name="delete">Delete</button>
    </div>
    <div class="btn-box">
    <a href="viewUni.php"><button class="cancel--btn" type="button" name="cancel">Cancel</button></a>
    </div>
  </div>
</form>
</div>
<br><br>
</body>

</body>
        </html>
        <?php
    } else {
        // University details not found
        echo "University not found.";
    }
} else {
    // University ID not provided
    echo "Invalid university ID.";
}


include "footer.php";
?>
