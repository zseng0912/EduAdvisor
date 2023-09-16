<!-- Programmer Name: Voon Jin Hui
Program Name: editScholarship.php
Description: Edit Scholarship
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";
$id = $_GET['scholarship_id'];

if (isset($_POST['btnUpdate'])){
    $category = $_POST['txtCategory'];
    $criteria = $_POST['txtCriteria'];
    $percentage = $_POST['txtPercentage'];
    $updateQuery = "UPDATE `scholarship_t` SET `scholarship_category`='$category',
    `criteria`='$criteria',`percentage_offered`='$percentage' WHERE scholarship_id = '$id'";
    if (mysqli_query($connection, $updateQuery)){
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
        echo "<script>";
        echo "Swal.fire({";
        echo "    title: 'Edit Successful!',";
        echo "    text: 'Scholarship Updated Successfully',";
        echo "    icon: 'success',";
        echo "    confirmButtonText: 'Back'";
        echo "}).then(function() {";
        echo "    window.location.href = 'updateScholarship.php';";
        echo "});";
        echo "</script>";  
        } else {
        echo 'Sorry, something went wrong';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editScholarship.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <title>Edit Scholarship Form</title>
</head>
<body>
    <?php
    $query = "SELECT * FROM `scholarship_t` WHERE scholarship_id= '$id'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1){
    ?>
    <div class="container">
    <div class="row header">
        <h1>Edit Scholarship Form &nbsp;</h1>
        <!-- <h3>Edit when necessary</h3> -->
    </div>
    <div class="row body">
        <form action="#" method="post">
        <ul>           
            <li>
            <p class="left">
                <label for="txtID">Scholarship ID</label>
                <input type="text" name="txtID" value="<?php echo $row['scholarship_id'];?>" required readonly>
            </p>
            <p class="pull-right">
                <label for="txtCategory">Scholarship Category</label>
                <input type="text" name="txtCategory" value="<?php echo $row['scholarship_category'];?>" required readonly>      
            </p>
            </li>
            
            <li>
            <p>
                <label for="txtCriteria">Criteria</label>
                <input type="text" name="txtCriteria" value="<?php echo $row['criteria'];?>" required>
            </p>
            </li>        

            <li>
            <p>
                <label for="txtPercentage">Percentage Offer / Link</label>
                <input type="text" name="txtPercentage" value="<?php echo $row['percentage_offered'];?>" required>
            </p>
            </li>        
            <!-- <li><div class="divider"></div></li> -->
            
            <li>
            <input class="btn btn-submit" type="submit" value="Edit" name="btnUpdate"/>
            <small> or press <strong>enter</strong></small>
            <br>
            <small> return to <strong><a href="updateScholarship.php">Scholarship</a></strong></small>
            </li>
            
        </ul>
        </form>
    </div>
    </div>
    <?php
    } else {
        echo 'Record not found!';
    }
    ?>

</body>
</html>

<?php
include "footer.php";
?>