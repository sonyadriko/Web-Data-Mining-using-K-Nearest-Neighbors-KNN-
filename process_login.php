<?php

	include 'koneksi.php';

	//session_start();
	
	if (isset($_POST['login'])) {
		// code...
		$username = ($_POST['username']);
		$password = (md5($_POST['password']));

		$query2 = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$result = $connect->query($query2);

		if ($result->num_rows == 0){
			echo "User tidak ada!";
		}else {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['nama'] = $row['nama'];

			header("Location:index.php");
		}
	}

?>