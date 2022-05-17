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

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Perhitungan KNN</h1>
                  <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
 -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data yang diketahui atau data testing</h6>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-12 col-md-9">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <form method="GET" action="#">
                                                <table border="0" cellpadding="10" cellspacing="0">
                                                    <tr>
                                                        <td>Age : </td>
                                                        <td><input type="number" name="inputage" class="form-control form-control-user" id="exampleAge" style="-moz-appearance: textfield; "></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year : </td>
                                                        <td><input type="number" name="inputyear" class="form-control form-control-user" id="exampleYear" style="-moz-appearance: textfield;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Axillary : </td>
                                                        <td><input type="number" name="inputaxillary" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; "></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Parameter K : </td>
                                                        <td><input type="number" name="inputk" class="form-control form-control-user" id="exampleK" style="-moz-appearance: textfield; "></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="submit" class="btn btn-primary btn-user btn-block" name="hitung" value="Hitung"></td>
                                                    </tr>
                                                </table>
                                               
                                                <br>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Age</th>
                                            <th>Year</th>
                                            <th>Axillary</th>
                                            <th>Survival Status</th>
                                            <th>Euclidean</th>
                                            <th>Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $nomor = 1;

                                            $get_data = mysqli_query($conn, "select * from data_training");

                                            while ($display=mysqli_fetch_array($get_data)) {
                                                // code...
                                                $id_datatraining = $display['id_datatraining'];
                                                $age = $display['age'];
                                                $year = $display['year'];
                                                $axillary = $display['axillary'];
                                                $survival_status = $display['survival_status'];
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $age ?></td>
                                            <td><?php echo $year ?></td>
                                            <td><?php echo $axillary ?></td>
                                            <td><?php echo $survival_status ?></td>
                                            <td><?php sqrt(($age-41)^2+($year-65)^2+($axillary-0)^2) ?></td>
                                        </tr>
                                        <?php
                                            $nomor++;
                                            }
                                        ?>
                                    </tbody>
                                </table>-->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
        include 'logout_modal.php';
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>