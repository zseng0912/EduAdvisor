<!-- Programmer Name: Voon Jin Hui
Program Name: userProfile.php
Description: User Profile & Application Status
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

  $updateQuery = "UPDATE `user_t` SET `user_name`='$name',`user_email`='$email',`user_password`='$password' WHERE user_id = ". $_SESSION['user_id'];
  if (mysqli_query($connection, $updateQuery)){
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>';
    echo "<script>";
    echo "Swal.fire({";
    echo "    title: 'Update Successful!',";
    echo "    text: 'User Profile Update Successfully',";
    echo "    icon: 'success',";
    echo "    confirmButtonText: 'Back'";
    echo "}).then(function() {";
    echo "    window.location.href = 'userProfile.php';";
    echo "});";
    echo "</script>";  
  } else {
      echo 'Sorry, something went wrong';
  }
}

if (!empty($_SESSION['user_id'])) {
    echo 'User has logged in';
    $query = "SELECT * FROM user_t WHERE user_id = " . $_SESSION['user_id'] ;
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
    <title>User Profile</title>
</head>
<body>
<div class="side_wrapper">
  <section class="about-dev">
    <header class="profile-card_header">
      <div class="profile-card_header-container">
        <div class="profile-card_header-imgbox">
          <img src="data:image/png;base64,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" alt="Profile" />
        </div>
    </div>
    </header>
    <div class="profile-card_about">
      <h2>User Profile</h2>
      <!-- <p>I'm an aspiring ruler of hoomans from Chicago, looking for my fur-ever home. I like treats and playing and treats. And treats. I'd do well in a home where hoomans give me lots of treats!</p> -->
    
      <form action="#" method="post">
        <div class="form-group">
            <span>Name</span>
            <input class="form-field" type="text" name="txtName" value="<?php echo $row['user_name'];?>" required>
        </div>

        <div class="form-group">
            <span>Email</span>
            <input class="form-field" type="email" name="txtEmail" value="<?php echo $row['user_email'];?>" required>
        </div>

        <div class="form-group">
            <span>Password</span>
            <input class="form-field" type="text" name="txtPassword" value="<?php echo $row['user_password'];?>" required>
        </div>

        <footer class="profile-card_footer">
        <div class="social-row">
            <input style="padding: 10px 15px;" class="back-to-profile" type="submit" value="Update Profile" name="updateProfile">
        </div>
        <!-- <p><a class="back-to-profile" href="#">Update Profile</a></p> -->
      </footer>
      </form>
      <?php
        $showQuery = "SELECT * FROM application_t WHERE user_id=  ". $_SESSION['user_id'];
        $results = mysqli_query($connection, $showQuery);
      ?>
      <div class="profile-card_about" style="padding: 1rem 2rem 0rem 2rem;">
        <h2>Application</h2>
      </div>
      <?php
            if (mysqli_num_rows($results) > 0){
              while ($row = mysqli_fetch_assoc($results)){
            ?>
        <!-- <div class="application" style="background-color:white;width:670px;border-radius:10px;margin-left:25px;padding:20px;"> -->
          <table class="<?php echo $row ['application_id'];?>" style="width:80%;border-style:hidden;margin:20px;background-color:white;border-radius:20px;">
            <tr>
              <td style="height:30px;width:65%;text-indent: 20px;"> <?php echo $row ['university_name'];?> </td>
              <td style="text-indent: 10px;">Status</td>
            </tr>
            <tr>
              <td style="height:30px;width:65%;text-indent: 20px;"> <?php echo $row ['course_name'];?> </td>
              <td style="text-indent: 10px;"> <?php echo $row ['status'];?> </td>
            </tr>

            <?php
              }
            ?>
          </table>
        </div>
      <!-- </div>
      </div>   -->
      <?php
  } else {
    ?>
      <p style="text-transform: none;text-indent:30px;font-weight:500;">No application. Apply your dream University and Course <a href="applu.php">here</a></p>
    <?php
  }
    ?>
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
</html>


