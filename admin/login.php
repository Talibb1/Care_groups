<!-- Database Connection -->
<?php session_start(); ?>
<?php include "Connection/config.php" ?>
<?php 

if(isset($_SESSION["userId"])){
header("location:index.php");
}
?>

<!-- PHP Code  -->
<?php

$fetch_regitered_user = "SELECT * FROM `admin_register`";
$fetch_regitered_prepare = $connection->prepare($fetch_regitered_user);
$fetch_regitered_prepare->execute();
$registered_user_data = $fetch_regitered_prepare->fetchAll(PDO::FETCH_ASSOC);

// print_r($registered_user_data);


if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

    $email_regex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
    $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    $isLoginNotSuccessful = false;

    // Validate email
    if (!preg_match($email_regex, $email)) {
        $isLoginNotSuccessful = true;
        echo "<script>alert('Invalid email format!')</script>";
    }

    // Validate password
    if (!preg_match($password_regex, $password)) {
        $isLoginNotSuccessful = true;
        echo "<script>alert('Invalid password format!')</script>";
    }

	foreach ($registered_user_data as $user_data) {
		if ($user_data['user_email'] === $email && password_verify($password, $user_data['user_password'])) {
			$_SESSION['userId'] = $user_data['user_id'];
			$_SESSION['userName'] = $user_data['user_name'];
			$_SESSION['userEmail'] = $user_data['user_email'];
			header("location:index.php");
		} else {
			$isLoginNotSuccessfull = true;
		}
	}
	if ($isLoginNotSuccessfull) {
		echo "<script>alert('Either email or password is wrong!')</script>";
	}
}
?>
<!-- /PHP Code  -->



<!-- HTML code  -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Login</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Form -->
							<form action="login.php" method="post">
								<div class="form-group">
									<input class="form-control"  name="email" type="Email" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="form-control" name="password" type="password" placeholder="Password">
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
								</div>
							</form>
							<!-- /Form -->

							<div class="text-center forgotpass"><a href="forgot-password.php">Forgot Password?</a></div>
							<div class="login-or">
								<span class="or-line"></span>
								<span class="span-or">or</span>
							</div>


							<!-- Social Login -->
							<div class="social-login">
								<span>Login with</span>
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#"
									class="google"><i class="fa fa-google"></i></a>
							</div>
							<!-- /Social Login -->

							<div class="text-center dont-have">Don’t have an account? <a
									href="register.php">Register</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
</body>
</html>
<!-- /HTML code  -->