<!-- Programmer Name: Voon Jin Hui
Program Name: fetch_table.php
Description: Fetch and Show Scholarship Details
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include 'dbConn.php';

$results = null;
$selectedTab = $_GET['tabs'] ?? 'SPM';

if ($selectedTab === 'SPM') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'SPM'";
    $results = mysqli_query($connection, $query);
} else if ($selectedTab === 'STPM') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'STPM'";
    $results = mysqli_query($connection, $query);
} else if ($selectedTab === 'A-Levels') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'A-Levels'";
    $results = mysqli_query($connection, $query);
} else if ($selectedTab === 'Foundation / Diploma') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'Foundation / Diploma'";
    $results = mysqli_query($connection, $query);
} else if ($selectedTab === 'Matriculation') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'Matriculation'";
    $results = mysqli_query($connection, $query);
} else if ($selectedTab === 'IGCSE') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'IGCSE'";
    $results = mysqli_query($connection, $query);
} else if ($selectedTab === 'UEC') {
    $query = "SELECT * FROM scholarship_t WHERE scholarship_category = 'UEC'";
    $results = mysqli_query($connection, $query);
}

if ($results && mysqli_num_rows($results) > 0) {
    echo '<table id="scholarshipTable" border="1" style="display: none;">';
    echo '<tr>';
    // echo '<th>ID</th>';
    // echo '<th>Scholarship Category</th>';
    echo '<th >Criteria</th>';
    echo '<th style="width: 75%;">Percentage Offer</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($results)) {
        echo '<tr >';
        // echo '<td>' . $row['id'] . '</td>';
        // echo '<td>' . $row['scholarship_category'] . '</td>';
        echo '<td>' . $row['criteria'] . '</td>';
        echo '<td>' . $row['percentage_offered'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>

