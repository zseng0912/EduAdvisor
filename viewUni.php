<!-- Programmer Name: Tang Jin Xun
Program Name: viewUni.php
Description: Manage University
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include "dbConn.php";
include "header.php";
$query = "SELECT * FROM university_t";
$results = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edu Advisor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="content.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="shortcut icon" href="images/EduAdvisor.png">
  <script src="https://kit.fontawesome.com/ed7a464247.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Insert ur content here -->

    <div class="title">
        <h1>University </h1><br>
        <h3><a href="addUni.php">Add more  <i class="fa-regular fa-square-plus fa-beat"></i></a></h3>
    </div>
    <div class="row">
    <?php 
    if (mysqli_num_rows($results) > 0)
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<div class='uniAbox'>"; ?>
            <img class="uniLogo" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['logo']); ?>" alt="university_image" height="300px" width="300px"/> 
            <?php
            echo "<h2>" . $row["university_name"]. "</h2>";
            echo "<p>Location: " . $row["location"]. "</p>";
            echo "<p id='editBtn'><a href='editUni.php?id=" . $row['university_id'] . "'>";
            echo "Edit <i class='fa-regular fa-pen-to-square fa-fade'></i></a></p>";
            echo "</div>";
            
    }?>
    <br>
    </div>
    <?php
    include "footer.php";
    ?>


</body>
</html>