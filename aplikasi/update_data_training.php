<?php 

	include 'koneksi.php';

	$id_datatraining = $_GET['id'];
	$brand = $_POST['inputbrand'];
	$jenis = $_POST['inputjenis'];
	$bahan = $_POST['inputbahan'];
	$harga = $_POST['inputharga'];
	$bintang = $_POST['inputbintang'];
	$terjual = $_POST['inputterjual'];
	$penjualan = $_POST['inputpenjualan'];

	$query = "UPDATE data_training set brand = '".$brand."', jenis = '".$jenis."', bahan = '".$bahan."', harga = '".$harga."', bintang = '".$bintang."',  terjual = '".$terjual."', penjualan = '".$penjualan."' where id_data = '".$id_datatraining."'";
	$result = mysqli_query($conn,$query);

	if ($result) {
		// code...
		header("Location:data_training.php");
	}else {
		header('please check again');
	}
?>