<?php include "Navbar/header.php" ?>
<?php session_start(); ?>

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
				<div class="col">
					<h3 class="page-title">Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item active">Profile</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="profile-header">
					<div class="row align-items-center">
						<div class="col-auto profile-image">
							<a href="#">
								<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-01.jpg">
							</a>
						</div>
						<div class="col ml-md-n2 profile-user-info">
							<h4 class="user-name mb-0">
								<?php echo $_SESSION['userName'] ?>
							</h4>
							<h6 class="text-muted">
								<?php echo $_SESSION['userEmail'] ?>
							</h6>
							<div class="user-Location"><i class="fa fa-map-marker"></i> SD-1, Block A North Nazimabad
								Town</div>
							<div class="about-text">profiles are used to control administrator access privileges to
								devices or system features.</div>
						</div>
						<div class="col-auto profile-btn">

							<a href="#" class="btn btn-primary">
								Edit
							</a>
						</div>
					</div>
				</div>
				<div class="profile-menu">
					<ul class="nav nav-tabs nav-tabs-solid">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="profile.php">About</a>
						</li>

					</ul>
				</div>
				<div class="tab-content profile-tab-cont">

					<!-- Personal Details Tab -->
					<div class="tab-pane fade show active" id="per_details_tab">

						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title d-flex justify-content-between">
											<span>Personal Details</span>
											<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
													class="fa fa-edit mr-1"></i>Edit</a>
										</h5>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
											<p class="col-sm-10">
												<?php echo $_SESSION['userName'] ?>
											</p>
										</div>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
											<p class="col-sm-10">24 Jul 1983</p>
										</div>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
											<p class="col-sm-10">
												<?php echo $_SESSION['userEmail'] ?>
											</p>
										</div>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
											<p class="col-sm-10">+92 3228290468</p>
										</div>
										<div class="row">
											<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
											<p class="col-sm-10 mb-0">SD-1, Block A North Nazimabad Town,<br>
												Karachi- 74700,<br>
												pakistan</p>
										</div>
									</div>
								</div>

								<!-- Edit Details Modal -->
								<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Personal Details</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form>
													<div class="row form-row">
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>First Name</label>
																<input type="text" class="form-control" value="John">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>Last Name</label>
																<input type="text" class="form-control" value="Doe">
															</div>
														</div>
														<div class="col-12">
															<div class="form-group">
																<label>Date of Birth</label>
																<div class="cal-icon">
																	<input type="text" class="form-control"
																		value="24-07-1983">
																</div>
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>Email ID</label>
																<input type="email" class="form-control"
																	value="johndoe@example.com">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>Mobile</label>
																<input type="text" value="+1 202-555-0125"
																	class="form-control">
															</div>
														</div>
														<div class="col-12">
															<h5 class="form-title"><span>Address</span></h5>
														</div>
														<div class="col-12">
															<div class="form-group">
																<label>Address</label>
																<input type="text" class="form-control"
																	value="4663 Agriculture Lane">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>City</label>
																<input type="text" class="form-control" value="Miami">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>State</label>
																<input type="text" class="form-control" value="Florida">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>Zip Code</label>
																<input type="text" class="form-control" value="22434">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>Country</label>
																<input type="text" class="form-control"
																	value="United States">
															</div>
														</div>
													</div>
													<button type="submit" class="btn btn-primary btn-block">Save
														Changes</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- /Edit Details Modal -->

							</div>


						</div>
						<!-- /Personal Details -->

					</div>
					<!-- /Personal Details Tab -->

				</div>
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