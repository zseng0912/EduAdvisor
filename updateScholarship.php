<!-- Programmer Name: Voon Jin Hui
Program Name: updateScholarship.php
Description: View Scholarship (User)
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include 'dbConn.php';
include 'header.php';
$query = "SELECT * FROM scholarship_t";
$results = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updateScholarship.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <title>Update Scholarship</title>
    <style>
        .action {
            color:black;
            text-decoration: none;
        }

        .action:hover{
            color: blue;
        }

        table{
            /* border: 1px solid black; */
            /* border-style: dotted; */
            border-collapse: collapse;
            /* border-radius: 1em; */
            /* overflow:hidden; */
            width: 100%; 
            margin-bottom: 20px;
        }

        th{
            background-color: #D6EEEE;
        }

        th, td {
            border: 1px solid black;
            border-style: dotted;
            /* border-collapse: collapse; */
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }

        tr:hover {background-color: #D6EEEE;}

    </style>
</head>
<body>
    <div class="container">
        <!-- <span>Update Scholarship</span> -->
        <h1>Update Scholarship</h1>
        <a href="addScholarship.php">
            <button style="float:right; margin-bottom:10px;">    
                <span>Insert New</span>
            </button>
        </a>
        <h2 >Scholarship Details: </h2>
        <table class="w3-table-all w3-hoverable">
        <!-- <table border = 1 style="width: 100%" class="w3-table-all w3-hoverable"> -->
            <tr>
            <!-- <tr class="w3-light-grey"> -->
                <th style="width: 5%">ID</th>
                <th style="width: 25%">Scholarship Category</th>
                <th style="width: 35%">Criteria</th>
                <th style="width: 20%">Percentage Offer</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr>
                    <td> <?php echo $row ['scholarship_id'];?> </td>
                    <td> <?php echo $row ['scholarship_category'];?> </td>
                    <td> <?php echo $row ['criteria'];?> </td>
                    <td> <?php echo $row ['percentage_offered'];?> </td>
                    <td style="width:7%"> <a class="action" href="editScholarship.php?scholarship_id=<?php echo $row ['scholarship_id'];?>">Edit</a></td>
                    <td> <a class="action" href="deleteScholarship.php?scholarship_id=<?php echo $row ['scholarship_id'];?>">Delete</a></td>
                    <!-- <td> Delete</td> -->
                </tr>
            <?php
            } 
            ?>
                    
        </table>
    </div>
</body>
<?php
    include "footer.php";
?>

</html>