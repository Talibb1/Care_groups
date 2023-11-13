<!-- Database Connection -->
<?php include "Connection/config.php" ?>
<!-- link Navbar -->
<?php include "Navbar/header.php" ?>

<!-- PHP Code  -->


<?php
session_start();


if (!isset($_SESSION['userId'])) {
	header("Location: login.php");
	exit();
}


$doctorId = $_SESSION['userId'];
$fetch_doctor_query = "SELECT * FROM `add_doctors` WHERE `user_id` = :user_id";
$fetch_doctor_prepare = $connection->prepare($fetch_doctor_query);
$fetch_doctor_prepare->bindParam(':user_id', $doctorId);
$fetch_doctor_prepare->execute();
$doctorInfo = $fetch_doctor_prepare->fetch(PDO::FETCH_ASSOC);

// Update existing data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
	// Handle image upload
	if ($_FILES['select_image']['name'] !== "") {
		$uploadDir = "assets/img/doctors/";
		$uploadedFile = $uploadDir . basename($_FILES['select_image']['name']);
		move_uploaded_file($_FILES['select_image']['tmp_name'], $uploadedFile);

		// Update image in the database
		$update_image_query = "UPDATE `add_doctors` SET `select_image` = :select_image WHERE `user_id` = :user_id";
		$update_image_prepare = $connection->prepare($update_image_query);
		$update_image_prepare->bindParam(':select_image', $_FILES['select_image']['name']);
		$update_image_prepare->bindParam(':user_id', $doctorId);
		$update_image_prepare->execute();
	}

	// Update the rest of the doctor information
	$update_doctor_query = "UPDATE `add_doctors` SET 
        `user_name` = :user_name, 
        `user_email` = :user_email, 
        `user_password` = :user_password, 
        `doctor_name` = :doctor_name,
        `phone_number` = :phone_number,
        `gender` = :gender,
        `birth_date` = :birth_date,
        `doctor_speciality` = :doctor_speciality,
        `speciality_image` = :speciality_image,
        `cities` = :cities,
        `dor_biography` = :dor_biography,
        `clinic_name` = :clinic_name,
        `clinic_address` = :clinic_address,
        `add_pricing` = :add_pricing,
        `dor_degree` = :dor_degree,
        `dor_institute` = :dor_institute,
        `year_completion` = :year_completion,
        `hospital_name` = :hospital_name,
        `from_year` = :from_year,
        `to_year` = :to_year,
        `dor_designation` = :dor_designation
        WHERE `user_id` = :user_id";

	$update_doctor_prepare = $connection->prepare($update_doctor_query);
	$update_doctor_prepare->bindParam(':user_name', $_POST['user_name']);
	$update_doctor_prepare->bindParam(':email', $_POST['email']);
	$update_doctor_prepare->bindParam(':password', $_POST['password']);
	$update_doctor_prepare->bindParam(':doctor_name', $_POST['doctor_name']);
	$update_doctor_prepare->bindParam(':number', $_POST['phone_number']);
	$update_doctor_prepare->bindParam(':gender', $_POST['gender']);
	$update_doctor_prepare->bindParam(':birthdate', $_POST['birthdate']);
	$update_doctor_prepare->bindParam(':speciality', $_POST['speciality']);
	$update_doctor_prepare->bindParam(':cities', $_POST['select_cities']);
	$update_doctor_prepare->bindParam(':dor_biography', $_POST['dor_biography']);
	$update_doctor_prepare->bindParam(':clinic_name', $_POST['clinic_name']);
	$update_doctor_prepare->bindParam(':clinic_address', $_POST['clinic_address']);
	$update_doctor_prepare->bindParam(':add_pricing', $_POST['add_pricing']);
	$update_doctor_prepare->bindParam(':dor_degree', $_POST['dor_degree']);
	$update_doctor_prepare->bindParam(':dor_institute', $_POST['dor_institute']);
	$update_doctor_prepare->bindParam(':year_completion', $_POST['year_completion']);
	$update_doctor_prepare->bindParam(':hospital_name', $_POST['hospital_name']);
	$update_doctor_prepare->bindParam(':from_year', $_POST['from_year']);
	$update_doctor_prepare->bindParam(':to_year', $_POST['to_year']);
	$update_doctor_prepare->bindParam(':dor_designation', $_POST['dor_designation']);
	$update_doctor_prepare->bindParam(':speciality_image', $_FILES['speciality_image']['name']);
	$update_doctor_prepare->bindParam(':user_id', $doctorId);

	$update_doctor_prepare->execute();
}
?>

<!-- /PHP Code  -->
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
					<h3 class="page-title">Add Doctor</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:(0)">Add Doctor</a></li>

					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<!-- Main Wrapper -->
			<div class="col-12">

				<form action="edit_doctors.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php echo $doctorId; ?>">
					<div class="main-wrapper">

						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">

													<div class="profile-img">
														<img src="assets/img/doctors/doctor-thumb-02.jpg"
															alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" name="select_image" class="upload">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
															size of 2MB</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">

												<label>User Name <span class="text-danger">*</span></label>
												<input type="text" name="user_name"
													value="<?php echo $doctorInfo['user_name']; ?>"
													class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" name="email"
													value="<?php echo $doctorInfo['email']; ?>" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Password<span class="text-danger">*</span></label>
												<input type="Password" name="password" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Insert Doctor Name <span class="text-danger">*</span></label>
												<input type="text" name="doctor_name"
													value="<?php echo $doctorInfo['doctor_name']; ?>"
													class="form-control">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input name="phone_number" value="<?php echo $doctorInfo['number']; ?>"
													type="number" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select name="gender" class="form-control select">
													<option value="" disabled selected>Select Gender</option>
													<option value="Male" <?php echo ($doctorInfo['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
													<option value="Female" <?php echo ($doctorInfo['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth</label>
												<input type="date" value="<?php echo $doctorInfo['birthdate']; ?>"
													name="birthdate" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Speciality</label>
												<input type="text" value="<?php echo $doctorInfo['speciality']; ?>"
													name="speciality" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Speciality Image</label>
												<input type="file" name="speciality_image"
													accept="image/png, image/gif, image/jpeg" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Select Cities</label>
												<select type="text" name="select_cities" class="form-control">
													<option value="" disabled selected>Select Cities</option>

													<option value="Karachi" <?php echo ($doctorInfo['cities'] === 'Karachi') ? 'selected' : ''; ?>>
														Karachi</option>
													<option value="Lahore" <?php echo ($doctorInfo['cities'] === 'Lahore') ? 'selected' : ''; ?>>Lahore</option>
													<option value="Islamabad" <?php echo ($doctorInfo['cities'] === 'Islamabad') ? 'selected' : ''; ?>>
														Islamabad</option>
													<option value="Peshawar" <?php echo ($doctorInfo['cities'] === 'Peshawar') ? 'selected' : ''; ?>>
														Peshawar</option>
												</select>
											</div>
										</div>
									</div>
									<!-- /Basic Information -->

									<!-- About Me -->
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">About Me</h4>
											<div class="form-group mb-0">
												<label>Biography</label>
												<textarea class="form-control" name="dor_biography"
													rows="2"><?php echo $doctorInfo['dor_biography']; ?></textarea>
											</div>
										</div>
									</div>
									<!-- /About Me -->

									<!-- Clinic Info -->
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Clinic Information</h4>
											<div class="row form-row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Clinic Name</label>
														<input type="text"
															value="<?php echo $doctorInfo['clinic_name']; ?>"
															name="clinic_name" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Clinic Address</label>
														<input type="text"
															value="<?php echo $doctorInfo['clinic_address']; ?>"
															name="clinic_address" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Clinic Info -->

									<!-- Pricing -->
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Pricing</h4>
											<div class="col-md-6">
												<div class="form-group">
													<label>Add Pricing</label>
													<input type="number"
														value="<?php echo $doctorInfo['add_pricing']; ?>"
														name="add_pricing" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<!-- /Pricing -->

									<!-- Education -->
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Education</h4>
											<div class="education-info">
												<div class="row form-row education-cont">
													<div class="col-12 col-md-10 col-lg-11">
														<div class="row form-row">
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Degree</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['dor_degree']; ?>"
																		name="dor_degree" class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['dor_institute']; ?>"
																		name="dor_institute" class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['year_completion']; ?>"
																		name="year_completion" class="form-control">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Education -->

									<!-- Experience -->
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Experience</h4>
											<div class="experience-info">
												<div class="row form-row experience-cont">
													<div class="col-12 col-md-10 col-lg-11">
														<div class="row form-row">
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Hospital Name</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['hospital_name']; ?>"
																		name="hospital_name" class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>From</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['from_year']; ?>"
																		name="from_year" class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>To</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['to_year']; ?>"
																		name="to_year" class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Designation</label>
																	<input type="text"
																		value="<?php echo $doctorInfo['dor_designation']; ?>"
																		name="dor_designation" class="form-control">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<!-- /Experience -->


									<div class="submit-section submit-btn-bottom">
										<button type="submit" name="update" class="btn btn-primary submit-btn">Save
											Changes</button>
									</div>
								</div>

							</div>



						</div>
					</div>
				</form>

			</div>
		</div>
		<!-- /Page Wrapper -->

	</div>
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