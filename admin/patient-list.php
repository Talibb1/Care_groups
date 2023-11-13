<?php include "Navbar/header.php" ?>
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
					<h3 class="page-title">List of Patient</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="#">Users</a></li>
						<li class="breadcrumb-item active">Patient</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div class="table-responsive">
								<table class="table table-hover table-center mb-0">
									<thead>
										<tr>
											<th>Patient ID</th>
											<th>Patient Name</th>
											<th>Age</th>
											<th>Address</th>
											<th>Phone</th>
											<th>Last Visit</th>
											<th class="text-right">Paid</th>
											<th class="text-right">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>#PT001</td>
											<td>
												<h2 class="table-avatar">
													<a href="profile.php" class="avatar avatar-sm mr-2"><img
															class="avatar-img rounded-circle"
															src="assets/img/patients/patient1.jpg" alt="User Image"></a>
													<a href="#">Charlene Reed </a>
												</h2>
											</td>
											<td>29</td>
											<td>4417 Goosetown Drive, Taylorsville, North Carolina, 28681</td>
											<td>8286329170</td>
											<td>20 Oct 2019</td>
											<td class="text-right">$100.00</td>

											<td class="text-right">
												<div class="actions">
													<a class="btn btn-sm bg-success-light" href="edit_patients.php">
														<i class="fe fe-pencil"></i> Edit
													</a>
													<a href="" class="btn btn-sm bg-danger-light">
														<i class="fe fe-trash"></i> Delete
													</a>
												</div>
											</td>
										</tr>


									</tbody>
								</table>
							</div>
						</div>
					</div>
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

<!-- Datatables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>

</html>