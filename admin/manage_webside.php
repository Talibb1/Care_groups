<!-- Database Connection -->
<?php include "Connection/config.php" ?>
<!-- link Navbar -->
<?php include "Navbar/header.php" ?>

<?php
session_start();
if (!isset($_SESSION['userId'])) {
	header("Location: login.php");
	exit();
}


$fetch_website_query = "SELECT * FROM `manage_webside`";
$fetch_website_prepare = $connection->prepare($fetch_website_query);
$fetch_website_prepare->execute();
$websiteInfo = $fetch_website_prepare->fetch(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$newContact = $_POST['contact'];
	$newAddress = $_POST['address'];
	$newEmailAddress = $_POST['email_address'];
	$newBiography = $_POST['dor_biography'];

	if (!empty($_FILES['upload_img']['name'])) {
		$upload_dir = "assets/img/";
		$upload_file = $upload_dir . basename($_FILES['upload_img']['name']);
		move_uploaded_file($_FILES['upload_img']['tmp_name'], $upload_file);
		$newLogo = $_FILES['upload_img']['name'];

		$update_logo_query = "UPDATE `manage_webside` SET `user_logo` = :user_logo";
		$update_logo_prepare = $connection->prepare($update_logo_query);
		$update_logo_prepare->bindParam(':user_logo', $newLogo);
		$update_logo_prepare->execute();
	}

	$update_website_query = "UPDATE `manage_webside` SET 
        `user_contact` = :user_contact, 
        `user_address` = :user_address, 
        `user_email` = :user_email, 
        `webside_discruption` = :webside_discruption";

	$update_website_prepare = $connection->prepare($update_website_query);
	$update_website_prepare->bindParam(':user_contact', $newContact);
	$update_website_prepare->bindParam(':user_address', $newAddress);
	$update_website_prepare->bindParam(':user_email', $newEmailAddress);
	$update_website_prepare->bindParam(':webside_discruption', $newBiography);

	$update_website_prepare->execute();


	header("Location: manage_webside.php");
exit();
}
?>


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title">
					<span>Main</span>
				</li>
				<li class="active">
					<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
				<li>
					<a href="specialities.php"><i class="fe fe-users"></i> <span>Add Specialities</span></a>
				</li>
				<li>
					<a href="doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
				</li>
				<li>
					<a href="patient-list.php"><i class="fe fe-user"></i> <span>Patients List</span></a>
				</li>

				<li>
					<a href="settings.php"><i class="fe fe-vector"></i> <span>Add Doctor</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fe fe-vector"></i> <span> Edit </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="edit_doctors.php">Edit Doctors </a></li>
						<li><a href="edit_patients.php">Edit Patients </a></li>
					</ul>
				</li>
				<li>
					<a href="manage_webside.php"><i class="fe fe-vector"></i> <span>Manage Webside</span></a>
				<li>
				<li class="menu-title">
					<span>Pages</span>
				</li>
				<li>
					<a href="profile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
				<li>
				<li class="submenu">
					<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span
							class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="error-404.php">404 Error </a></li>
						<li><a href="error-500.php">500 Error </a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- /Sidebar -->


<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Manage Webside</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:(0)">Edit Webside</a></li>

					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">

			<div class="col-12">
				<!-- Main Wrapper -->
				<div class="main-wrapper">

					<div class="col-md-7 col-lg-8 col-xl-9">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
							enctype="multipart/form-data">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Webside Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">

													<div class="profile-img">
														<img src="assets/img/<?php echo $websiteInfo['user_logo']; ?>"
															alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload logo</span>
															<input type="file" name="upload_img" class="upload">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or
															PNG.</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Change Contact <span class="text-danger"></span></label>
												<input type="text" name="contact"
													value="<?php echo $websiteInfo['user_contact']; ?>"
													class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>change Address <span class="text-danger"></span></label>
												<input type="text" name="address"
													value="<?php echo $websiteInfo['user_address']; ?>"
													class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email Address<span class="text-danger"></span></label>
												<input type="email" name="email_address"
													value="<?php echo $websiteInfo['user_email']; ?>"
													class="form-control">
											</div>
										</div>

									</div>
									<!-- /Basic Information -->

									<!-- About Me -->
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Webside Discruption</h4>
											<div class="form-group mb-0">
												<label>Biography</label>
												<textarea class="form-control" type="text"
													value="<?php echo $websiteInfo['webside_discruption']; ?>"
													name="dor_biography" rows="2"></textarea>
											</div>
										</div>
									</div>
									<div class="submit-section submit-btn-bottom">
										<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
									</div>
									<!-- /About Me -->



								</div>

						</form>
					</div>
				</div>
				<!-- /Main Wrapper -->

			</div>
		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>


	</body>

	</html>