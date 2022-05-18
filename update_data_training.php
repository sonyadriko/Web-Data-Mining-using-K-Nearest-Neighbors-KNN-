<?php 

	include 'koneksi.php';

	$id_datatraining = $_GET['id'];
	$age = $_POST['inputage'];
	$year = $_POST['inputyear'];
	$axillary = $_POST['inputaxillary'];
	$survival_status = $_POST['inputsurv'];

	$query = "UPDATE data_training set age = '".$age."', year = '".$year."', axillary = '".$axillary."', survival_status = '".$survival_status."' where id_datatraining = '".$id_datatraining."'";
	$result = mysqli_query($conn,$query);

	if ($result) {
		// code...
		header("Location:data_training.php");
	}else {
		header('please check again');
	}
?>