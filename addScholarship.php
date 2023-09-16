<!-- Programmer Name: Voon Jin Hui
Program Name: addScholarship.php
Description: Add New Scholarship
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";

if (isset($_POST['btnAdd'])){
    $category = $_POST['txtCategory'];
    $criteria = $_POST['txtCriteria'];
    $percentage = $_POST['txtPercentage'];

    $insertQuery = "INSERT INTO `scholarship_t`(`scholarship_category`, `criteria`, `percentage_offered`) 
    VALUES ('$category','$criteria','$percentage')";

    // $results($connection, $insertQuery);
    if (mysqli_query($connection, $insertQuery)){
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
        echo "<script>";
        echo "Swal.fire({";
        echo "    title: 'Added Successful!',";
        echo "    text: 'Record Added Successfully',";
        echo "    icon: 'success',";
        echo "    confirmButtonText: 'Back'";
        echo "}).then(function() {";
        echo "    window.location.href = 'updateScholarship.php';";
        echo "});";
        echo "</script>";  
    } else {
        echo 'Sorry, something went wrong';
    }

mysqli_close($connection);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editScholarship.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <title>Add New Scholarship</title>
</head>
<body>
    <div class="container">
        <div class="row header2">
            <h1>Add New Scholarship &nbsp;</h1>
            <!-- <h3>Edit when necessary</h3> -->
        </div>
        <div class="row body">
            <form action="#" method="post">
            <ul>           
                <li>
                <p class="pull-right">
                    <label for="txtCategory">Scholarship Category</label>
                    <!-- <input type="text" name="txtCategory" placeholder="SPM/STPM/A-Levels/Foundation/Diploma/IGCSE/UEC/Government" required> -->
                        <select name="txtCategory" id="scholar">
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
                </p>
                </li>
                
                <li>
                <p>
                    <label for="txtCriteria">Criteria</label>
                    <input type="text" name="txtCriteria" placeholder="10A / 9A..." required>
                </p>
                </li>        

                <li>
                <p>
                    <label for="txtPercentage">Percentage Offer / Link</label>
                    <input type="text" name="txtPercentage" placeholder="100% / 90%..." required>
                </p>
                </li>        
                
                <li>
                <input class="btn btn-submit" type="submit" value="Add" name="btnAdd"/>
                <small> or press <strong>enter</strong></small>
                <br>
                <small> return to <strong><a href="updateScholarship.php">Scholarship</a></strong></small>
                </li>
                
            </ul>
            </form>
        </div>
    </div>
</body>
</html>
<?php
include "footer.php";
?>
