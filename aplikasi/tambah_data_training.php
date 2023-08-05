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

    <title>Tambah Data Training</title>

    <!-- Custom fonts for this template -->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style type="text/css">
        .inputage {
             list-style: none;
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Training</h1>
                  <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
 -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-12 col-md-9">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <form method="POST" action="tambah_data_training.php">
                                                <table border="0" cellpadding="10" cellspacing="0">
                                                <tr>
                                                        <td>Brand : </td>
                                                        <td><input type="number" name="inputbrand" class="form-control form-control-user" id="exampleAge" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis : </td>
                                                        <td><input type="number" name="inputjenis" class="form-control form-control-user" id="exampleYear" style="-moz-appearance: textfield;" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bahan : </td>
                                                        <td><input type="number" name="inputbahan" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga : </td>
                                                        <td><input type="number" name="inputharga" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bintang : </td>
                                                        <td><input type="number" step="0.01" name="inputbintang" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Terjual : </td>
                                                        <td><input type="number" name="inputterjual" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penjualan : </td>
                                                        <td><input type="number" name="inputpenjualan" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="data_training.php" style="text-decoration: none; list-style: none;"><input type="button" class="btn btn-primary btn-user btn-block" name="back" value="Back"></a></td>
                                                        <td><input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Tambah"></td>
                                                    </tr>
                                                </table>
                                               
                                                <br>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

<?php
        if (isset($_POST['submit'])) {
            // code...
            $brand = $_POST['inputbrand'];
            $jenis = $_POST['inputjenis'];
            $bahan = $_POST['inputbahan'];
            $harga = $_POST['inputharga'];
            $bintang = $_POST['inputbintang'];
            $terjual = $_POST['inputterjual'];
            $penjualan = $_POST['inputpenjualan'];

            $insertData = "INSERT INTO data_training (`id_data`, `brand`, `jenis`, `bahan`, `harga`, `bintang`, `terjual`, `penjualan`) VALUES (NULL, '$brand', '$jenis', '$bahan', '$harga', '$bintang', '$terjual', '$penjualan')";
            $insertResult = mysqli_query($conn, $insertData);

            if ($insertResult) {
                // code...
                echo "<script>alert('Berhasil menambah data training.')</script>";
                // header("Location:index.php");
            }else {
                var_dump($insertResult);

            }
        }
?>