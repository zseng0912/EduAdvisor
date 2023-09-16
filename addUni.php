<!-- Programmer Name: Tang Jin Xun
Program Name: addUni.php
Description: Add New University
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="editCourseForm.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <form action="uploadUni.php" id="updateUniversityForm" class="form" method="POST" enctype="multipart/form-data">
    <h1 style="text-align:center;">Update University Information</h1>
    <div class="course-info--form">
        <div class="input_container">
        <label for="university_name" class="input_label">University Name</label>
        <input id="university_name" class="input_field" type="text" name="University_name" title="University Name" placeholder="Enter Uni Name" required>
        </div>

        <div class="input_container">
        <label for="location" class="input_label">Location</label>
        <input id="location" class="input_field" type="text" name="Location" title="Location" placeholder="Enter location" required>
        </div>

        <div class="input_container">
        <label for="latitude" class="input_label">Latitude</label>
        <input id="latitude" class="input_field" type="number" step="any" name="Latitude" title="Latitude" placeholder="Enter Latitude" required>
        </div>

        <div class="input_container">
        <label for="longitude" class="input_label">Longitude</label>
        <input id="longitude" class="input_field" type="number" step="any" name="Longitude" title="Longitude" placeholder="Enter Longitude" required>
        </div>

        <div class="input_container">
        <label for="foundation_intake" class="input_label">Foundation intake</label>
        <input id="foundation_intake" class="input_field" type="text" name="Foundation_intake" title="Foundation intake" placeholder="Enter intake">
        </div>

        <div class="input_container">
        <label for="diploma_intake" class="input_label">Diploma intake</label>
        <input id="diploma_intake" class="input_field" type="text" name="Diploma_intake" title="Diploma intake" placeholder="Enter intake">
        </div>

        <div class="input_container">
        <label for="degree_intake" class="input_label">Degree intake</label>
        <input id="degree_intake" class="input_field" type="text" name="Degree_intake" title="Degree intake" placeholder="Enter intake">
        </div>

        <div class="input_container">
        <label for="uni_detail" class="input_label">University Description</label>
        <textarea id="uni_detail" class="input_field" name="Uni_detail" cols="30" rows="10" required></textarea>
        </div>

        <div class="input_container">
            <label for="image" class="input_label">University Logo</label>
            <input type="file" class="input_field" name="image" required>
        </div>


        <div class="btn-box">
            <button class="update--btn" type="submit" name="add">Add</button>       
            <a href="viewUni.php"><button class="delete--btn" type="button" name="delete">Cancel</button></a>
        </div>
    </div>
    </form>
</div>
<br><br>
</body>
</html>

<?php
include "footer.php";
?>
