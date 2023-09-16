<!-- Programmer Name: Tang Jin Xun
Program Name: uploadUni.php
Description: Upload University Details into Database
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php 
// Include the database configuration file  
session_start();
include 'dbConn.php'; 
include 'header.php';
// include 'header.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["add"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $universityName = $_POST['University_name'];
            $location = $_POST['Location'];
            $latitude = $_POST['Latitude'];
            $longitude = $_POST['Longitude'];
            $foundationIntake = $_POST['Foundation_intake'];
            $diplomaIntake = $_POST['Diploma_intake'];
            $degreeIntake = $_POST['Degree_intake'];
            $uniDetail = $_POST['Uni_detail'];
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            // Insert image content into database 
            // $insert = $connection->query("INSERT into product_data (Product_Name, Product_Description, Price, Weight, 
            // Category, image, created) VALUES ('$Name', '$Description', '$Price', '$Weight', '$Category', '$imgContent', NOW())"); 
            $insert = $connection->query("INSERT INTO university_t (`university_name`, location, latitude, longitude, `foundation_intake`, 
            `diploma_intake`, `degree_intake`, `description`, logo) VALUES ('$universityName', '$location', '$latitude', '$longitude', 
            '$foundationIntake', '$diplomaIntake', '$degreeIntake', '$uniDetail', '$imgContent')"); 

            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Successful</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
</head>
<body>
    <?php if ($status == 'success'){?>
    <script>
        Swal.fire({
        title: 'Succesful!',
        text: 'University Information Added!',
        icon: 'success',
        confirmButtonText: 'Confirm'
        }).then(function() {
            window.location.href = "viewUni.php";
        });
    </script>
    <?php } else {
        echo '<script>alert("Information upload failed, please try again.")</script>';
        echo '<script>window.location.href = "viewUni.php";</script>';
    }
    ?>
</body>
</html>