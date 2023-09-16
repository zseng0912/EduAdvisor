<!-- Programmer Name: Tan Zu Seng
Program Name: deleteCourse.php
Description: Delete Course Details
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";

if (isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];

    // Delete logic here
    $deleteSql = "DELETE FROM course_t WHERE course_id = '$courseId'";
    $deleteResult = $connection->query($deleteSql);

    if ($deleteResult) {
        echo json_encode(['status' => 'success', 'message' => 'Course deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting course.']);
    }
}
?>
