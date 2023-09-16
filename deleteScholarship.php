<!-- Programmer Name: Voon Jin Hui
Program Name: deleteScholarship.php
Description: Delete Scholarship
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
include 'dbConn.php';

$id = $_GET['scholarship_id'];

$deleteQuery = "DELETE FROM `scholarship_t` WHERE scholarship_id = '$id'";
if (mysqli_query($connection, $deleteQuery)){
    mysqli_close($connection);
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
    echo "<script>";
    echo "Swal.fire({";
    echo "    title: 'Delete Successful!',";
    echo "    text: 'Scholarship Deleted Successfully',";
    echo "    icon: 'success',";
    echo "    confirmButtonText: 'Back'";
    echo "}).then(function() {";
    echo "    window.location.href = 'updateScholarship.php';";
    echo "});";
    echo "</script>"; 
    header("Location: updateScholarship.php");
} else {
    echo 'Sorry, something went wrong';
    mysqli_close($connection);
}
?>