<!-- Programmer Name: Voon Jin Hui
Program Name: login.php
Description: Login into account
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
session_start();
include 'dbConn.php';

if (isset($_POST['signIn'])){
	$email = $_POST['txtEmail'];
	$password = $_POST['txtPassword'];

	$query = "SELECT * FROM user_t WHERE user_email = '$email' AND user_password = '$password'";

	$results = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($results);
	$count = mysqli_num_rows($results);
	if ($count == 1){
		$username = $row['user_name'];
		echo "<script>alert('User Account found. Welcome, $username!');</script>";
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['name'] = $row['user_name'];
		$_SESSION['email'] = $row['user_email'];
		$_SESSION['userloggedIn'] = true;
		header("Location:index.php");
	} else {
		echo "<script>alert('Sign in fail! Check your credentials');</script>";
	}
}

if (isset($_POST['adminSignIn'])){
	$email = $_POST['txtEmail'];
	$password = $_POST['txtPassword'];

	$query = "SELECT * FROM admin_t WHERE admin_email = '$email' AND admin_password = '$password'";

	$results = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($results);
	$count = mysqli_num_rows($results);
	if ($count == 1){
		$adminName = $row['admin_name'];
		echo "<script>alert('Welcome, $adminName!');</script>";
		$_SESSION['admin_id'] = $row['admin_id'];
		$_SESSION['name'] = $row['admin_name'];
		$_SESSION['email'] = $row['admin_email'];
		$_SESSION['adminloggedIn'] = true;
		header("Location:AdminPage.php");
	} else {
		echo "<script>alert('Admin Sign in fail! Check your credentials');</script>";
	}

}

if (isset($_POST['signUp'])){
	$user_name = $_POST['txtName'];
	$user_email = $_POST['txtEmail'];
	$user_password = $_POST['txtPassword'];

	$query = "INSERT INTO `user_t`(`user_name`, `user_email`, `user_password`)
	VALUES ('$user_name','$user_email','$user_password')";
	// $result = mysqli_query($connection,$query);
	if (mysqli_query($connection,$query)) {
		// echo 'Successfully sign up for an account!, Please proceed to sign in';
		echo "<script>alert('Successfully sign up! You May log in now');</script>";
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
	<link rel="stylesheet" href="login.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert.js"></script>
	<link rel="shortcut icon" href="images/EduAdvisor.png">
	<style>
		.button-signup {
		display: block;
		margin: 0 auto;
		width: 260px;
		height: 36px;
		border-radius: 30px;
		color: #fff;
		font-size: 15px;
		cursor: pointer;
		margin-top: 40px;
		margin-bottom: 20px;
		background: #d4af7a;
		text-transform: uppercase;
		}

		.button-adminSignIn{
		display: block;
		margin: 0 auto;
		width: 260px;
		height: 36px;
		border-radius: 30px;
		color: #fff;
		font-size: 15px;
		cursor: pointer;
		border: 2px solid #d3dae9;
		color: #8fa1c7;
		background: #FFFFFF;
		text-transform: none;
		}

  	</style>
  	<title>Log In</title>
</head>

<body>
	<p class="tip">EduAdvisor: Sign In Page</p>
	<div class="cont">
		<form action="#" method="post">
		<div class="form sign-in">
			<h2>Welcome back,</h2>
			<label>
			<span>Email</span>
			<input type="email" name="txtEmail" required>
			</label>
			<label>
			<span>Password</span>
			<input type="password" name="txtPassword" required>
			</label>
			<!-- <p class="forgot-pass">Forgot password?</p> -->
			<input type="submit" value="Sign In" name="signIn" class="submit button-signup">
			<!-- <button type="button" class="submit">Sign In</button> -->
			<!-- <button type="button" class="submit">Sign In</button> -->

			<input type="submit" value="Sign in as admin" name="adminSignIn" class="submit button-adminSignIn">
			<!-- <button type="button" class="admin-btn">Sign In as <span>admin</span></button> -->
			<!-- <button type="button" class="fb-btn">Connect with <span>facebook</span></button> -->
		</div>
		</form>
    
    <div class="sub-cont">

		<div class="img">
			<div class="img__text m--up">
			<h2>New here?</h2>
			<p>Sign up and discover great amount of universities, courses and scholarships in EduAdvisor!</p>
			</div>

			<div class="img__text m--in">
			<h2>One of us?</h2>
			<p>If you already has an account, just sign in. We've missed you!</p>
			</div>

			<div class="img__btn">
			<span class="m--up">Sign Up</span>
			<!-- THIS BELOW -->
			<span class="m--in">Sign In</span>
			</div>
		</div>

		<form action="#" method="post">
			<div class="form sign-up">
			<h2>Time to explore more here,</h2>
			<label>
				<span>Name</span>
				<input type="text" name="txtName" required>
			</label>
			<label>
				<span>Email</span>
				<input type="email" name="txtEmail" required>
			</label>
			<label>
				<span>Password</span>
				<input type="password" name="txtPassword" required>
			</label>

			<!-- <button type="button" class="submit">Sign Up</button> -->
			<input type="submit" value="Sign Up" name="signUp" class="submit button-signup">
			<!-- <input type="submit" value="Register" name="register" id="submit"> -->

			<button type="button" class="fb-btn">Has an account? <span>Sign in here</span></button>
			<!-- <button type="button" class="fb-btn">Join with <span>facebook</span></button> -->
			</div>
		</form>
    	</div>
  	</div>
</body>

<script>
	document.querySelector('.img__btn').addEventListener('click', function () {
		document.querySelector('.cont').classList.toggle('s--signup');
	});

	document.querySelector('.fb-btn').addEventListener('click', function () {
		document.querySelector('.cont').classList.toggle('s--signup');
	});
</script>

</html>