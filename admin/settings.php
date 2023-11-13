<!-- Database Connection -->
<?php include "Connection/config.php" ?>
<!-- link Navbar -->
<?php include "Navbar/header.php" ?>

<!-- PHP Code  -->
<?php
$fetch_registered_user = "SELECT * FROM `add_doctors`";
$fetch_registered_prepare = $connection->prepare($fetch_registered_user);
$fetch_registered_prepare->execute();
$registered_user_data = $fetch_registered_prepare->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    // Image Upload Logic
    $target_dir = "assets/img/"; 
    $target_file = $target_dir . basename($_FILES['upload_img']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $maxFileSize = 25 * 1024 * 1024;

    $SelectImage = $_FILES['upload_img']['tmp_name'];
    $uploadOk = 1;

    // Check file size
    if ($_FILES['upload_img']['size'] > $maxFileSize) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
        if (move_uploaded_file($SelectImage, $target_file)) {
            echo "<script>alert('The file " . htmlspecialchars(basename($_FILES['upload_img']['name'])) . " has been uploaded.')</script>";
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }

    $DoctorName = $_POST['doctor_name'];
    $Speciality = $_POST['speciality'];
    $Fee = $_POST['add_pricing'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $speciality_image = $target_file; 
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
		  // Validate email format
		  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Invalid email format')</script>";
			return;
		}
	
		// Password strength validation
		$password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
		if (!preg_match($password_regex, $password)) {
			echo "<script>alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character')</script>";
			return;
		}
        foreach ($registered_user_data as $user) {
            if ($DoctorName === $user['doctor_name']) {
                echo "<script>alert('Your email is already in use')</script>";
                return;
            } else {
                $isEmailNotExist = true;
            }
        }

        if ($isEmailNotExist) {
            $hash_password = password_hash($password, PASSWORD_BCRYPT);

            $register_user_query = "INSERT INTO `add_doctors`(`select_image`, `user_name`, `user_email`, `user_password`, `doctor_name`, `phone_number`, `gender`, `birth_date`, `doctor_speciality`, `speciality_image`, `cities`, `dor_biography`, `clinic_name`, `clinic_address`, `doctor_fee`, `dor_degree`, `dor_institute`, `year_completion`, `hospital_name`, `from_year`, `to_year`, `dor_designation`) VALUES (:select_image, :user_name, :user_email, :user_password, :doctor_name, :phone_number, :gender, :birth_date, :doctor_speciality, :speciality_image, :cities, :dor_biography, :clinic_name, :clinic_address, :doctor_fee, :dor_degree, :dor_institute, :year_completion, :hospital_name, :from_year, :to_year, :dor_designation)";
            $register_user_query_prepare = $connection->prepare($register_user_query);
            $register_user_query_prepare->bindParam(':select_image', $target_file); // Use the uploaded image path here
            $register_user_query_prepare->bindParam(':user_name', $user_name);
            $register_user_query_prepare->bindParam(':user_email', $email);
            $register_user_query_prepare->bindParam(':user_password', $hash_password);
            $register_user_query_prepare->bindParam(':doctor_name', $DoctorName);
            $register_user_query_prepare->bindParam(':phone_number', $phone_number);
            $register_user_query_prepare->bindParam(':gender', $gender);
            $register_user_query_prepare->bindParam(':birth_date', $birthdate);
            $register_user_query_prepare->bindParam(':doctor_speciality', $Speciality);
            $register_user_query_prepare->bindParam(':speciality_image', $speciality_image);
            $register_user_query_prepare->bindParam(':cities', $select_cities);
            $register_user_query_prepare->bindParam(':dor_biography', $dor_biography);
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

            echo "<script>alert('Doctor added successfully')</script>";
        }
    }
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

					<div class="col-md-7 col-lg-8 col-xl-9">
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" name="upload_img" class="upload">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
															size of 25MB</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>User Name <span class="text-danger">*</span></label>
												<input type="text" name="user_name" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" name="email" class="form-control">
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
												<input type="text" name="doctor_name" class="form-control">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input name="phone_number" type="number" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select name="gender" class="form-control select">
													<option value="" disabled selected>Select Gender</option>
													<option value="">Male</option>
													<option value="">Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth</label>
												<input type="date" name="birthdate" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Speciality</label>
												<input type="text" name="speciality" class="form-control">
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
													<option value="Karachi">Karachi</option>
													<option value="lahore">lahore</option>
													<option value="Islamabad">Islamabad</option>
													<option value="audi">Peshawar</option>
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
												<textarea class="form-control" name="dor_biography" rows="2"></textarea>
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
														<input type="text" name="clinic_name" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Clinic Address</label>
														<input type="text" name="clinic_address" class="form-control">
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
													<input type="number" name="add_pricing" class="form-control">
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
																	<input type="text" name="dor_degree"
																		class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text" name="dor_institute"
																		class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<input type="text" name="year_completion"
																		class="form-control">
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
																	<input type="text" name="hospital_name"
																		class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>From</label>
																	<input type="text" name="from_year"
																		class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>To</label>
																	<input type="text" name="to_year"
																		class="form-control">
																</div>
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Designation</label>
																	<input type="text" name="dor_designation"
																		class="form-control">
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
										<button type="submit" name="submit"
											class="btn btn-primary submit-btn">Add</button>

									</div>
						</form>
					</div>
					<!-- / Add Doctor-->
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