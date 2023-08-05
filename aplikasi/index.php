<?php  
    include 'koneksi.php';
   session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        h1{
           color : #000000;
        }
        h5{
           color : #000000;
        }
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'sidebar.php' ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <?php include 'topbar.php'; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Training</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php $querytraining = "SELECT COUNT(*) AS jumlah FROM data_training";
                                                $resulttraining = $conn->query($querytraining);
                                                $hasil = mysqli_fetch_array($resulttraining);
                                                echo "{$hasil['jumlah']}"; ?>                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Atribut</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php $querytraining = "SELECT COUNT(*) AS jumlah FROM atribut";
                                                $resulttraining = $conn->query($querytraining);
                                                $hasil = mysqli_fetch_array($resulttraining);
                                                echo "{$hasil['jumlah']}"; ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php $querytraining = "SELECT COUNT(*) AS jumlah FROM user";
                                                $resulttraining = $conn->query($querytraining);
                                                $hasil = mysqli_fetch_array($resulttraining);
                                                echo "{$hasil['jumlah']}"; ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h2 mb-0">k-Nearest Neighbor</h1>
                    </div>
                    <h5>K-Nearest Neighbor adalah suatu metode yang menggunakan algoritma supervised learning dimana hasil dari instance yang baru diklasifikasikan berdasarkan mayoritas dari kategori k-tetangga terdekat. Algoritma k-Nearest Neighbor menggunakan Neighborhood Classification sebagai nilai prediksi dari nilai instance yang baru.</h5>   <br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h2 mb-0">Proses KNN</h1>
                    </div>
                    <h5>
                        Prinsip kerja K-Nearest Neighbor (KNN) adalah mencari jarak terdekat antara data yang akan dievaluasi dengan k tetangga (neighbor) terdekatnya dalam data pelatihan(training). Dengan k merupakan banyaknya tetangga terdekat. 
                        <br>
                        Data training diproyeksikan ke ruang berdimensi banyak, yang mana masing-masing dimensi menjelaskan fitur dari data. Ruang ini dibagi menjadi bagian-bagian berdasarkan klasifikasi data training. Sebuah titik pada ruang ini ditandai kelas k(titik hitam) , kelas k merupakan klasifikasi yang paling banyak ditemui pada k buah tetangga terdekat titik tersebut.
                        <br>
                        Dalam menentukan nilai atau kelas k , sebaiknya kita gunakan nilai ganjil, karena jika tidak, ada kemungkinan kita tidak akan mendapatkan jawaban. Penentuan nilai k dipertimbangkan berdasarkan banyaknya data yang ada dan ukuran dimensi yang dibentuk oleh data. Semakin banyak data yang ada, angka k yang dipilih sebaiknya semakin rendah. Namun, semakin besar ukuran dimensi data, angka k yang dipilih sebaiknya semakin tinggi.Untuk mencari dekat atau jauhnya jarak antar titik pada kelas k biasanya dihitung menggunakan jarak Euclidean .
                    </h5>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include 'footer.php' ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include 'logout_modal.php';?>
    <!-- Bootstrap core JavaScript-->
    <?php include 'import_js.php' ?>
</body>

</html>