<?php
include "Navbar/header.php";
include "admin/Connection/config.php";

// $doctorId = $_GET['user_id']; 

// $single_doctor_query = "SELECT * FROM `add_doctors` WHERE `user_id` = :user_id";
// $single_doctor_prepare = $connection->prepare($single_doctor_query);
// $single_doctor_prepare->bindParam(':user_id', $doctorId);
// $single_doctor_prepare->execute();

// $single_doctor = $single_doctor_prepare->fetch(PDO::FETCH_ASSOC);


// if (!$single_doctor) {

//     echo "Doctor not found!";
//     exit();
// }

?>


<!-- Main Wrapper -->
<div class="main-wrapper">
	<!-- Breadcrumb -->
	<div class="breadcrumb-bar">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-12 col-12">
					<nav aria-label="breadcrumb" class="page-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
						</ol>
					</nav>
					<h2 class="breadcrumb-title">Doctor Profile</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<div class="container">


				<!-- Doctor Widget -->
				<div class="card">
					<div class="card-body">
						<div class="doctor-widget">
							<div class="doc-info-left">
								<div class="doctor-img">
									<img src="assets/img/doctors/<?php echo $single_doctor['select_image']; ?>" class="img-fluid" alt="User Image">
								</div>
								<div class="doc-info-cont">
									<h4 class="doc-name"><?php echo $single_doctor['doctor_name']; ?></h4>
									<p class="doc-speciality"><?php echo $single_doctor['doctor_speciality']; ?></p>
									<p class="doc-department"><img src="assets/img/specialities/specialities-05.png"
											class="img-fluid" alt="Speciality"></p>

									<div class="clinic-details">
										<p class="doc-location"><i class="fas fa-map-marker-alt"></i><?php echo $single_doctor['cities']; ?></p>
									</div>
									<div class="clinic-services">
										<span>Dental Fillings</span>
										<span>Teeth Whitneing</span>
									</div>
								</div>
							</div>
							<div class="doc-info-right">
								<div class="clini-infos">
									<ul>
										<li><i class="far fa-thumbs-up"></i> 99%</li>
										
										<li><i class="fas fa-map-marker-alt"></i><?php echo $single_doctor['cities']; ?></li>
										<li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
									</ul>
								</div>

								<div class="clinic-booking">
									<a class="apt-btn" href="booking.php">Book Appointment</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Doctor Widget -->

				<!-- Doctor Details Tab -->
				<div class="card">
					<div class="card-body pt-0">

						<!-- Tab Menu -->
						<nav class="user-tabs mb-4">
							<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
								<li class="nav-item">
									<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
								</li>
							
								<li class="nav-item">
									<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
								</li>
							</ul>
						</nav>
						<!-- /Tab Menu -->

						<!-- Tab Content -->
						<div class="tab-content pt-0">

							<!-- Overview Content -->
							<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
								<div class="row">
									<div class="col-md-12 col-lg-9">

										<!-- About Details -->
										<div class="widget about-widget">
											<h4 class="widget-title">About Me</h4>
											<p><?php echo $single_doctor['dor_biography']; ?>
											</p>
										</div>
										<!-- /About Details -->

										<!-- Education Details -->
										<div class="widget education-widget">
											<h4 class="widget-title">Education</h4>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name"><?php echo $single_doctor['dor_degree']; ?></a>
																<div><?php echo $single_doctor['dor_institute']; ?></div>
																<span class="time"><?php echo $single_doctor['year_completion']; ?></span>
															</div>
														</div>
													</li>

												</ul>
											</div>
										</div>
										<!-- /Education Details -->

										<!-- Experience Details -->
										<div class="widget experience-widget">
											<h4 class="widget-title">Work & Experience</h4>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name"><?php echo $single_doctor['hospital_name']; ?></a>
																<span class="time"><?php echo $single_doctor['year_completion']; ?></span>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Experience Details -->
									</div>
								</div>
							</div>
							<!-- /Overview Content -->

							<!-- Locations Content -->
							<div role="tabpanel" id="doc_locations" class="tab-pane fade">

								<!-- Location List -->
								<div class="location-list">
									<div class="row">

										<!-- Clinic Content -->
										<div class="col-md-6">
											<div class="clinic-content">
												<h4 class="clinic-name"><a href="#"><?php echo $single_doctor['clinic_name']; ?></a></h4>
												<p class="doc-speciality"><?php echo $single_doctor['clinic_address']; ?>
												</p>
												<div class="clinic-details mb-0">
													<h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i><?php echo $single_doctor['dor_designation']; ?> <br></h5>
												</div>
											</div>
										</div>
										<!-- /Clinic Content -->

										<!-- Clinic Timing -->
										<div class="col-md-4">
											<div class="clinic-timing">
												<div>
													<p class="timings-days">
														<span> Mon - Sat </span>
													</p>
													<p class="timings-times">
														<span>10:00 AM - 2:00 PM</span>
														<span>4:00 PM - 9:00 PM</span>
													</p>
												</div>
											
											</div>
										</div>
										<!-- /Clinic Timing -->

										<div class="col-md-2">
											<div class="consult-price">
											</i><?php echo $single_doctor['doctor_fee']; ?>
											</div>
										</div>
									</div>
								</div>
								<!-- /Location List -->

								

							</div>
							<!-- /Locations Content -->

						

							<!-- Business Hours Content -->
							<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
								<div class="row">
									<div class="col-md-6 offset-md-3">

										<!-- Business Hours Widget -->
										<div class="widget business-widget">
											<div class="widget-content">
												<div class="listing-hours">
													<div class="listing-day current">
														<div class="day">Today <span>5 Nov 2019</span></div>
														<div class="time-items">
															<span class="open-status"><span
																	class="badge bg-success-light">Open Now</span></span>
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">Monday</div>
														<div class="time-items">
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">Tuesday</div>
														<div class="time-items">
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">Wednesday</div>
														<div class="time-items">
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">Thursday</div>
														<div class="time-items">
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">Friday</div>
														<div class="time-items">
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">Saturday</div>
														<div class="time-items">
															<span class="time">07:00 AM - 09:00 PM</span>
														</div>
													</div>
													<div class="listing-day closed">
														<div class="day">Sunday</div>
														<div class="time-items">
															<span class="time"><span
																	class="badge bg-danger-light">Closed</span></span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /Business Hours Widget -->

									</div>
								</div>
							</div>
							<!-- /Business Hours Content -->

						</div>
					</div>
				</div>
				<!-- /Doctor Details Tab -->

			</div>
		</div>
		<!-- /Page Content -->
	


	<?php include "Footer/footer.php" ?>
</div>
<!-- /Main Wrapper -->


			</div>
		</div>
	</div>
</div>
<!-- Video Call Modal -->

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Fancybox JS -->
<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>

</html>