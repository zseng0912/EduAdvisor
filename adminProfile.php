<!-- Programmer Name: Voon Jin Hui
Program Name: adminProfile.php
Description: Admin Profile
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include 'dbConn.php';
include 'header.php';

if (isset($_POST['updateProfile'])){
  $name = $_POST['txtName'];
  $email = $_POST['txtEmail'];
  $password = $_POST['txtPassword'];

  $updateQuery = "UPDATE `admin_t` SET `admin_name`='$name',`admin_email`='$email',`admin_password`='$password' WHERE admin_id = ". $_SESSION['admin_id'];
  if (mysqli_query($connection, $updateQuery)){
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
    echo "<script>";
    echo "Swal.fire({";
    echo "    title: 'Update Successful!',";
    echo "    text: 'Admin Profile Update Successfully',";
    echo "    icon: 'success',";
    echo "    confirmButtonText: 'Back'";
    echo "}).then(function() {";
    echo "    window.location.href = 'adminProfile.php';";
    echo "});";
    echo "</script>"; 
  } else {
      echo 'Sorry, something went wrong';
  }
}

if (!empty($_SESSION['admin_id'])) {
    echo 'Admin has logged in';
    $query = "SELECT * FROM admin_t WHERE admin_id = " . $_SESSION['admin_id'] ;
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userProfile.css">
    <link rel="shortcut icon" href="images/EduAdvisor.png">
    <title>Admin Profile</title>
</head>
<body>
<div class="side_wrapper">
  <section class="about-dev">
    <header class="profile-card_header">
      <div class="profile-card_header-container">
        <div class="profile-card_header-imgbox">
          <img src="https://cdn1.vectorstock.com/i/1000x1000/11/10/admin-icon-male-person-profile-avatar-with-gear-vector-25811110.jpg" alt="Profile" />
        </div>
      </div>
    </header>
    <div class="profile-card_about">
      <h2 style="margin-left:25px;">Admin Profile</h2>
      <form action="#" method="post">
        <div class="form-group">
            <span>Name</span>
            <input class="form-field" type="text" name="txtName" value="<?php echo $row['admin_name'];?>" required>
        </div>

        <div class="form-group">
            <span>Email</span>
            <input class="form-field" type="email" name="txtEmail" style="text-transform: lowercase;" value="<?php echo $row['admin_email'];?>" required>
        </div>

        <div class="form-group">
            <span>Password</span>
            <input class="form-field" type="text" name="txtPassword" value="<?php echo $row['admin_password'];?>" required>
        </div>

        <footer class="profile-card_footer">
          <div class="social-row">
              <input style="padding: 10px 15px;margin-right:35px;" class="back-to-profile" type="submit" value="Update Profile" name="updateProfile">
          </div>
        </footer>
      </form>
    </div>
  </section>
</div>
</body>
</html>

<?php
    }
} else {
    header('Location: login.php');
}



include "footer.php";
?>

