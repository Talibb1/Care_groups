<!-- Database Connection -->
<?php session_start(); ?>
<?php include "Connection/config.php" ?>

<!-- PHP Code  -->
<?php
$fetch_regitered_user = "SELECT * FROM `admin_register`";
$fetch_regitered_prepare = $connection->prepare($fetch_regitered_user);
$fetch_regitered_prepare->execute();
$registered_user_data = $fetch_regitered_prepare->fetchAll(PDO::FETCH_ASSOC);
// print_r($registered_user_data);


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	$isEmailNotExist = false;



	if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
		echo "<script>alert('Kindly fill all the fields')</script>";
	} else {

		// ***** password_confirm *****
		if ($_POST["password"] === $_POST["confirm_password"]) {
			// echo "<script> alert(' Entered passwords are same') </script>";
		} else {
			echo "<script> alert(' Please enter same passwords ') </script>";
		}
		// ***** / password_confirm *****

		foreach ($registered_user_data as $user) {
			if ($email === $user['user_email']) {
				echo "<script>alert('Your email is already in use')</script>";
				return;
			} else {
				$isEmailNotExist = true;
			}
		}

		if ($isEmailNotExist) {
			// Password strength validation
			$password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
			if (!preg_match($password_regex, $password)) {
				echo "<script>alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character')</script>";
			} else {
				$hash_password = password_hash($password, PASSWORD_BCRYPT);
				$register_user_query = "INSERT INTO `admin_register`(`user_name`, `user_email`, `user_password`) VALUES (:username, :email, :password)";
				$register_user_query_prepare = $connection->prepare($register_user_query);
				$register_user_query_prepare->bindParam(':username', $username);
				$register_user_query_prepare->bindParam(':email', $email);
				$register_user_query_prepare->bindParam(':password', $hash_password);
				$register_user_query_prepare->execute();
				header("location:login.php");

			}
		}
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
	<title>Register</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
							<h1>Register</h1>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Form -->
							<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
								<div class="form-group">
									<input class="form-control" type="text" name="username" placeholder="Name">
								</div>
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="password" placeholder="Password">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="confirm_password"
										placeholder="Confirm Password">
								</div>
								<div class="form-group mb-0">
									<button class="btn btn-primary btn-block" name="submit"
										type="submit">Register</button>
								</div>
							</form>
							<!-- /Form -->

							<div class="login-or">
								<span class="or-line"></span>
								<span class="span-or">or</span>
							</div>
							<!-- Social Login -->
							<div class="social-login">
								<span>Register with</span>
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#"
									class="google"><i class="fa fa-google"></i></a>
							</div>
							<!-- /Social Login -->
							<div class="text-center dont-have">Already have an account? <a href="login.php">Login</a>
							</div>
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