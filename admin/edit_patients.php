<!-- Database Connection -->
<?php include "Connection/config.php" ?>
<!-- link Navbar -->
<?php include "Navbar/header.php" ?>

<!-- PHP Code  -->
<?php
$fetch_regitered_user = "SELECT * FROM `add_doctors`";
$fetch_regitered_prepare = $connection->prepare($fetch_regitered_user);
$fetch_regitered_prepare->execute();
$registered_user_data = $fetch_regitered_prepare->fetchAll(PDO::FETCH_ASSOC);
// print_r($registered_user_data);

// *** submit Data into the database 
if (isset($_POST['submit'])) {
	$SelectImage = $_FILES['select_image']['name']; 
	$DoctorName = $_POST['doctor_name'];
	$Speciality = $_POST['speciality']; 
	$Fee = $_POST['fee']; 
	$user_name = $_POST['user_name']; 
	$email = $_POST['email']; 
	$password = $_POST['password'];
	$phone_number = $_POST['phone_number']; 
	$gender = $_POST['gender']; 
	$speciality_image = $_FILES['speciality_image']; 
	$select_cities = $_POST['select_cities']; 
	$birthdate = $_POST['birthdate']; 
	$dor_biography = $_POST['dor_biography'];
	$clinic_name = $_POST['clinic_name'];
	$clinic_address = $_POST['clinic_address'];
	$dor_degree = $_POST['dor_degree'];
	$dor_institute = $_POST['dor_institute'];
	$year_completion = $_POST['year_completion'];
	$hospital_name = $_POST['hospital_name'];
	$from_year = $_POST['from_year'];
	$to_year = $_POST['to_year'];
	$dor_designation = $_POST['dor_designation'];


	$isEmailNotExist = false;

	if (empty($SelectImage) || empty($DoctorName) || empty($Speciality) || empty($Fee)) {
		echo "<script>alert('Kindly fill all the fields')</script>";
	} else {

		foreach ($registered_user_data as $user) {
			if ($DoctorName === $user['doctor_name']) {
				echo "<script>alert('Your email is already in use')</script>";
				return;
			} else {
				$isEmailNotExist = true;
			}
		}

		$register_user_query = "INSERT INTO `add_doctors`(`select_image`, `user_name`, `user_email`, `user_password`, `doctor_name`, `phone_number`, `gender`, `birth_date`, `doctor_speciality`, `speciality_image`, `cities`, `dor_biography`, `clinic_name`, `clinic_address`, `doctor_fee`, `dor_degree`, `dor_institute`, `year_completion`, `hospital_name`, `from_year`, `to_year`, `dor_designation`) VALUES (:select_image, :user_name, :user_email, :user_password, :doctor_name, :phone_number, :gender, :birth_date, :doctor_speciality, :speciality_image, :cities, :dor_biography, :clinic_name, :clinic_address, :doctor_fee, :dor_degree, :dor_institute, :year_completion, :hospital_name, :from_year, :to_year, :dor_designation)";
		$register_user_query_prepare = $connection->prepare($register_user_query);
		$register_user_query_prepare->bindParam(':select_image', $SelectImage);
		$register_user_query_prepare->bindParam(':user_name', $user_name);
		$register_user_query_prepare->bindParam(':user_email', $user_email);
		$register_user_query_prepare->bindParam(':user_password', $user_password);
		$register_user_query_prepare->bindParam(':doctor_name', $DoctorName);
		$register_user_query_prepare->bindParam(':phone_number', $phone_number);
		$register_user_query_prepare->bindParam(':gender', $gender);
		$register_user_query_prepare->bindParam(':birth_date', $birth_date);
		$register_user_query_prepare->bindParam(':doctor_speciality', $Speciality);
		$register_user_query_prepare->bindParam(':speciality_image', $speciality_image);
		$register_user_query_prepare->bindParam(':cities', $cities);
		$register_user_query_prepare->bindParam(':clinic_name', $clinic_name);
		$register_user_query_prepare->bindParam(':clinic_address', $clinic_address);
		$register_user_query_prepare->bindParam(':doctor_fee', $Fee);
		$register_user_query_prepare->bindParam(':dor_degree', $dor_degree);
		$register_user_query_prepare->bindParam(':dor_institute', $dor_institute);
		$register_user_query_prepare->bindParam(':year_completion', $year_completion);
		$register_user_query_prepare->bindParam(':hospital_name', $hospital_name);
		$register_user_query_prepare->bindParam(':from_year', $from_year);
		$register_user_query_prepare->bindParam(':to_year', $to_year);
		$register_user_query_prepare->bindParam(':dor_designation', $dor_designation);
		$register_user_query_prepare->execute();
		// header("location:login.php");
		move_uploaded_file($imageTempName, "images/" . $uniqueName);
	}
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

			<div class="col-12">
				<!-- Main Wrapper -->
				<div class="main-wrapper">


					<!-- Profile Settings Form -->
					<form>
						<div class="row form-row">
							<div class="col-12 col-md-12">
								<div class="form-group">
									<div class="change-avatar">
										<div class="profile-img">
											<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</div>
										<div class="upload-img">
											<div class="change-photo-btn">
												<span><i class="fa fa-upload"></i> Upload Photo</span>
												<input type="file" class="upload">
											</div>
											<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
												2MB</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Date of Birth</label>
									<div class="">
										<input type="date" class="form-control datetimepicker" value="">
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Blood Group</label>
									<select class="form-control select">
										<option disabled selected>Select Blood Group</option>
										<option>A-</option>
										<option>A+</option>
										<option>B-</option>
										<option>B+</option>
										<option>AB-</option>
										<option>AB+</option>
										<option>O-</option>
										<option>O+</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Email ID</label>
									<input type="email" class="form-control" value="">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Mobile</label>
									<input type="number" value="" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Cities</label>
									<select type="text" name="select_cities" class="form-control">
										<option value="" disabled selected>Select Cities</option>
										<option value="Karachi">Karachi</option>
										<option value="lahore">lahore</option>
										<option value="Islamabad">Islamabad</option>
										<option value="Peshawar">Peshawar</option>
									</select>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Zip Code</label>
									<input type="number" class="form-control" value="">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Country</label>
									<select type="text" name="" value="" class="form-control">
										<option value="" disabled selected>Select Country</option>
										<option value="Pakistan">Pakistan</option>

									</select>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
						</div>
					</form>
					<!-- /Profile Settings Form -->

				</div>
				<!-- /Main Wrapper -->


			</div>
		</div>

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