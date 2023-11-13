<?php include "Connection/config.php" ?>
<?php include "Navbar/header.php" ?>
<?php session_start(); ?>

<?php
// Check if the user is logged in, and if not, redirect to the login page
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

$fetch_doctorCounts = "SELECT count(`doctor_name`) FROM `add_doctors`";
$fetch_doctorCounts = $connection->prepare($fetch_doctorCounts);
$fetch_doctorCounts->execute();
$fetch_doctorCounts_data = $fetch_doctorCounts->fetch(PDO::FETCH_ASSOC);



// print_r($fetch_doctorCounts_data);

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
					<h3 class="page-title">Welcome Admin!</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item active">Dashboard</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon text-primary border-primary">
								<i class="fe fe-users"></i>
							</span>
							<div class="dash-count">
								<h3>
									<?php echo $fetch_doctorCounts_data['count(`doctor_name`)']; ?>
								</h3>
							</div>
						</div>
						<div class="dash-widget-info">
							<h6 class="text-muted">Doctors</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon text-success">
								<i class="fe fe-credit-card"></i>
							</span>
							<div class="dash-count">
								<h3>1</h3>
							</div>
						</div>
						<div class="dash-widget-info">

							<h6 class="text-muted">Patients</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-success w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon text-danger border-danger">
								<i class="fe fe-money"></i>
							</span>
							<div class="dash-count">
								<h3>1</h3>
							</div>
						</div>
						<div class="dash-widget-info">

							<h6 class="text-muted">Appointment</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-danger w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon text-warning border-warning">
								<i class="fe fe-folder"></i>
							</span>
							<div class="dash-count">
								<h3>$6250</h3>
							</div>
						</div>
						<div class="dash-widget-info">

							<h6 class="text-muted">Revenue</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-warning w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-6">

				<!-- Sales Chart -->
				<div class="card card-chart">
					<div class="card-header">
						<h4 class="card-title">Revenue</h4>
					</div>
					<div class="card-body">
						<div id="morrisArea"></div>
					</div>
				</div>
				<!-- /Sales Chart -->

			</div>
			<div class="col-md-12 col-lg-6">

				<!-- Invoice Chart -->
				<div class="card card-chart">
					<div class="card-header">
						<h4 class="card-title">Status</h4>
					</div>
					<div class="card-body">
						<div id="morrisLine"></div>
					</div>
				</div>
				<!-- /Invoice Chart -->

			</div>
		</div>
		<div class="row">
			<div class="col-md-6 d-flex">

				<!-- Recent Orders -->
				<div class="card card-table flex-fill">
					<div class="card-header">
						<h4 class="card-title">Doctors List</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Speciality</th>
										<th>Earned</th>
										<th>Reviews</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="profile.php" class="avatar avatar-sm mr-2"><img
														class="avatar-img rounded-circle"
														src="assets/img/doctors/doctor-thumb-01.jpg"
														alt="User Image"></a>
												<a href="profile.php">Dr. Ruby Perrin</a>
											</h2>
										</td>
										<td>Dental</td>
										<td>$3200.00</td>
										<td>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star-o text-secondary"></i>
										</td>
									</tr>


								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /Recent Orders -->

			</div>
			<div class="col-md-6 d-flex">

				<!-- Feed Activity -->
				<div class="card  card-table flex-fill">
					<div class="card-header">
						<h4 class="card-title">Patients List</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Patient Name</th>
										<th>Phone</th>
										<th>Last Visit</th>
										<th>Paid</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="profile.php" class="avatar avatar-sm mr-2"><img
														class="avatar-img rounded-circle"
														src="assets/img/patients/patient1.jpg" alt="User Image"></a>
												<a href="profile.php">Charlene Reed </a>
											</h2>
										</td>
										<td>8286329170</td>
										<td>20 Oct 2019</td>
										<td class="text-right">$100.00</td>
									</tr>


								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /Feed Activity -->

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
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

<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/js/chart.morris.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>

</html>