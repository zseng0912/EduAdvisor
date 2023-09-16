<!-- Programmer Name: Tay Wei Qin
Program Name: viewApplication.php
Description: View User Application (Admin)
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include 'dbConn.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['approve'])) {
        $applicationId = $_POST['application_id'];
        $updateQuery = "UPDATE application_t SET status = 'Approved' WHERE application_id = '$applicationId'";
        if (mysqli_query($connection, $updateQuery)) {
            echo 'Status updated successfully';
        } else {
            echo 'Sorry, something went wrong';
        }
    } elseif (isset($_POST['decline'])) {
        $applicationId = $_POST['application_id'];
        $updateQuery = "UPDATE application_t SET status = 'Declined' WHERE application_id = '$applicationId'";
        if (mysqli_query($connection, $updateQuery)) {
            echo 'Status updated successfully';
        } else {
            echo 'Sorry, something went wrong';
        }
    }
}

$query = "SELECT * FROM application_t";
$results = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <link rel="stylesheet" href="updateScholarship.css">
    <title>Applied Candidate Information List</title>
    <style>
        .action {
            color:black;
            text-decoration: none;
        }

        .action:hover{
            color: blue;
        }

        table{
            border-collapse: collapse;
            width: 100%; 
            margin-bottom: 20px;
        }

        th{
            background-color: #D6EEEE;
        }

        th, td {
            border: 1px solid black;
            border-style: dotted;
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }

        tr:hover {background-color: #D6EEEE;}

    </style>
</head>
<body>
    <div class="container">
        <h1>Applied Candidate Information List</h1>
        <h2>Approve or Decline:</h2><br>
        <table class="w3-table-all w3-hoverable">
            <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 25%">Email</th>
                <th style="width: 35%">Name</th>
                <th style="width: 20%">University Applied</th>
                <th style="width: 10%">Status</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($results)) {
                ?>
                <tr>
                    <td><?php echo $row['application_id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['applicant_name']; ?></td>
                    <td><?php echo $row['university_name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if ($row['status'] !== 'Approved') { ?>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="application_id" value="<?php echo $row['application_id']; ?>">
                                <input type="submit" name="approve" value="Approve">
                            </form>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($row['status'] !== 'Declined') { ?>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="application_id" value="<?php echo $row['application_id']; ?>">
                                <input type="submit" name="decline" value="Decline">
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
include 'footer.php';
?>
