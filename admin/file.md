<?php
$fetch_regitered_user = "SELECT * FROM `add_doctors`";
$fetch_regitered_prepare = $connection->prepare($fetch_regitered_user);
$fetch_regitered_prepare->execute();
$registered_user_data = $fetch_regitered_prepare->fetchAll(PDO::FETCH_ASSOC);
// print_r($registered_user_data);

// *** submit Data into the database 
if (isset($_POST['submit'])) {
	$SelectImage = $_FILES['upload_img'];
	$DoctorName = $_POST['doctor_name'];
	$Speciality = $_POST['speciality'];
	$Fee = $_POST['add_pricing'];
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
		// move_uploaded_file($imageTempName, "images/" . $uniqueName);
	}
}
?>


<!-- Include Firebase SDK -->
<script src="https://www.gstatic.com/firebasejs/9.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.3.1/firebase-database.js"></script>

<script>
// Firebase configuration (replace with your own config)
var firebaseConfig = {
    apiKey: "YOUR_API_KEY",
    authDomain: "YOUR_AUTH_DOMAIN",
    projectId: "YOUR_PROJECT_ID",
    storageBucket: "YOUR_STORAGE_BUCKET",
    messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
    appId: "YOUR_APP_ID"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Reference to your Firebase Realtime Database
var database = firebase.database();



(`select_image`, `user_name`, `user_email`, `user_password`, `doctor_name`, `phone_number`, `gender`, `birth_date`, `doctor_speciality`, `speciality_image`, `cities`, `dor_biography`, `clinic_name`, `clinic_address`, `doctor_fee`, `dor_degree`, `dor_institute`, `year_completion`, `hospital_name`, `from_year`, `to_year`, `dor_designation`) VALUES (:select_image, :user_name, :user_email, :user_password, :doctor_name, :phone_number, :gender, :birth_date, :doctor_speciality, :speciality_image, :cities, :dor_biography, :clinic_name, :clinic_address, :doctor_fee, :dor_degree, :dor_institute, :year_completion, :hospital_name, :from_year, :to_year, :dor_designation)"

				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">


set the all php code and update the data in to the data based and aslo set the html code



#######################################################################################

<!-- Database Connection -->
<?php include "Connection/config.php" ?>
<!-- link Navbar -->
<?php include "Navbar/header.php" ?>

<!-- PHP Code  -->
<?php
// $fetch_regitered_user = "SELECT * FROM `add_doctors`";
// $fetch_regitered_prepare = $connection->prepare($fetch_regitered_user);
// $fetch_regitered_prepare->execute();
// $registered_user_data = $fetch_regitered_prepare->fetchAll(PDO::FETCH_ASSOC);
// print_r($registered_user_data);
// Fetch existing data for the doctor to be edited

if (isset($_GET['user_id'])) {
	$doctorId = $_GET['user_id'];
	$fetch_doctor_query = "SELECT * FROM `add_doctors` WHERE `user_id` = :user_id";
	$fetch_doctor_prepare = $connection->prepare($fetch_doctor_query);
	$fetch_doctor_prepare->bindParam(':user_id', $doctorId);
	$fetch_doctor_prepare->execute();
	$doctorInfo = $fetch_doctor_prepare->fetch(PDO::FETCH_ASSOC);
}
// *** submit Data into the database 
if (isset($_POST['update'])) {
	$doctorId = $_POST['user_id'];
	$SelectImage = $_FILES['select_image']['name'];
	$DoctorName = $_POST['doctor_name'];
	$Speciality = $_POST['speciality'];
	$Fee = $_POST['fee'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone_number = $_POST['phone_number'];
	$gender = $_POST['gender'];
	$speciality_image = $_FILES['speciality_image']['name'];
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


	$register_user_query = "UPDATE `add_doctors` SET `select_image` = :select_image, `user_name` = :user_name, `user_email` = :user_email, `user_password` = :user_password, `doctor_name` = :doctor_name, `phone_number` = :phone_number, `gender` = :gender, `birth_date` = :birth_date, `doctor_speciality` = :doctor_speciality, `speciality_image` = :speciality_image, `cities` = :cities, `dor_biography` = :dor_biography, `clinic_name` = :clinic_name, `clinic_address` = :clinic_address, `doctor_fee` = :doctor_fee, `dor_degree` = :dor_degree, `dor_institute` = :dor_institute, `year_completion` = :year_completion, `hospital_name` = :hospital_name, `from_year` = :from_year, `to_year` = :to_year, `dor_designation` = :dor_designation WHERE `user_id` = :user_id";

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
	$register_user_query_prepare->bindParam(':user_id', $doctorId);
	$register_user_query_prepare->execute();

}

?>



#######################################################################################
<?php
session_start();

// Check if the user is logged in, and if not, redirect to the login page
if (!isset($_SESSION['userId'])) {
	header("Location: login.php");
	exit();
}

// Fetch existing data for the website
$fetch_website_query = "SELECT * FROM `manage_webside`";
$fetch_website_prepare = $connection->prepare($fetch_website_query);
$fetch_website_prepare->execute();
$websiteInfo = $fetch_website_prepare->fetch(PDO::FETCH_ASSOC);

// Update existing data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$newContact = $_POST['contact'];
	$newAddress = $_POST['address'];
	$newEmailAddress = $_POST['email_address'];
	$newBiography = $_POST['dor_biography'];

	$update_website_query = "UPDATE `website_info` SET 
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
}
?>




#######################################################################################

<?php
session_start();

// Check if the user is logged in, and if not, redirect to the login page
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

// Fetch existing data for the website
$fetch_website_query = "SELECT * FROM `manage_webside`";
$fetch_website_prepare = $connection->prepare($fetch_website_query);
$fetch_website_prepare->execute();
$websiteInfo = $fetch_website_prepare->fetch(PDO::FETCH_ASSOC);

// Update existing data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newContact = $_POST['contact'];
    $newAddress = $_POST['address'];
    $newEmailAddress = $_POST['email_address'];
    $newBiography = $_POST['dor_biography'];

    // Image upload
    if (!empty($_FILES['upload_img']['name'])) {
        $upload_dir = "assets/img/";
        $upload_file = $upload_dir . basename($_FILES['upload_img']['name']);
        move_uploaded_file($_FILES['upload_img']['tmp_name'], $upload_file);
        $newLogo = $_FILES['upload_img']['name'];

        // Update the database with the new logo filename
        $update_logo_query = "UPDATE `manage_webside` SET `user_logo` = :user_logo";
        $update_logo_prepare = $connection->prepare($update_logo_query);
        $update_logo_prepare->bindParam(':user_logo', $newLogo);
        $update_logo_prepare->execute();
    }

    // Update the rest of the website information
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
    
    // Redirect to the same page to prevent form resubmission on page refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

#######################################################################################


<?php
include "Navbar/header.php";
include "admin/Connection/config.php";

$doctorId = $_GET['user_id']; // Assuming you pass the doctor_id in the URL

// Fetch doctor details from the database
$single_doctor_query = "SELECT * FROM `add_doctors` WHERE `user_id` = user_id";
$single_doctor_prepare = $connection->prepare($single_doctor_query);
$single_doctor_prepare->bindParam(':user_id', $doctorId);
$single_doctor_prepare->execute();

$single_doctor = $single_doctor_prepare->fetch(PDO::FETCH_ASSOC);

// Check if the doctor exists
if (!$single_doctor) {
    // Handle case when the doctor is not found
    echo "Doctor not found!";
    exit();
}

?>