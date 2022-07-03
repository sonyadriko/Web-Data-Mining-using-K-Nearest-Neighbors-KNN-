<?php

    include 'koneksi.php';
 session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }

    // class Euc{
    //                                             public $id_datatraining, $age, $year, $axillary, $survival_status;
    //                                             public $eucledian;
    //                                             public $rank;
    //                                         }

                                           

                                            // $rank = 0;
                                            // $last_score = false;
                                            // $rows = 0;
                                            // $array22=array();
                                            // $i = 0;

                                            // while ($display=mysqli_fetch_array($get_data)) {
                                            //     // code...
                                            //     $id_atribut = $display['id_atribut'];
                                            //     $nama_atribut = $display['nama_atribut'];
                                            //     $status_atribut = $display['status_atribut'];
                                            //     $nilai = $display['nilai'];
                                            //     $keterangan = $display['keterangan'];
                                               
                                                // $output = sqrt($a2+$b2+$c2);
                                                // $eucli = new Euc();
                                                // $eucli->id_datatraining = $id_datatraining;
                                                // $eucli->age = $age;
                                                // $eucli->year = $year;
                                                // $eucli->axillary = $axillary;
                                                // $eucli->survival_status = $survival_status;
                                                // $eucli->euclidean = $output;
                                                // $array22[$i] = $eucli;
                                                // $i++;

                                            //}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Training</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        th{
           color : #000000;
        }
        td{
           color : #000000;
        }
        p{
           color : #000000;
        }
        #datatable{
           color : #000000;
        }
        .dataTables_info {
            color : #000000;
        }
        .dataTable_length {
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
                   <!--  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Training</h6>
                            <a href="tambah_data_training.php" style="text-decoration: none; list-style: none;"><input type="button" class="btn btn-primary btn-user" name="adddata" value="Tambah Data"></a>
                              <!-- <a href="export_excel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

                        </div>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Brand</th>
                                            <th>Jenis</th>
                                            <th>Bahan</th>
                                            <th>Harga</th>
                                            <th>Bintang</th>
                                            <th>Terjual</th>
                                            <th>Penjualan</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $nomor = 1;
                                         $get_data = mysqli_query($conn, "select * from data_testing");

                                         while ($display=mysqli_fetch_array($get_data)) {
                                                // code...
                                                $id_datatraining = $display['id_data_testing'];
                                                $brand = $display['brand2'];
                                                $jenis = $display['jenis2'];
                                                $bahan = $display['bahan2'];
                                                $harga = $display['harga2'];
                                                $bintang = $display['bintang2'];
                                                $terjual = $display['terjual2'];
                                                $penjualan = $display['penjualan2'];
                                   
                                        ?>

                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $brand ?></td>
                                            <td><?php echo $jenis ?></td>
                                            <td><?php echo $bahan ?></td>
                                            <td><?php echo "Rp ". number_format($harga,0,",",".") ?></td>
                                            <td><?php echo $bintang ?></td>
                                            <td><?php echo $terjual ?></td>
                                            <td><?php if ($penjualan == 1) {
                                                echo "Rendah";
                                            }else if($penjualan == 2) {
                                                echo "Tinggi";
                                            } ?></td>
                                            
                                            <!-- <td>
                                                <a href='edit_data_training.php?GetID=<?php echo $id_datatraining ?>' style="text-decoration: none; list-style: none;"><input type='submit' value='Edit' id='editbtn' class="btn btn-primary btn-user" ></a>
                                                <a href='delete_data_training.php?Del=<?php echo $id_datatraining ?>' style="text-decoration: none; list-style: none;"><input type='submit' value='Delete' id='delbtn' class="btn btn-primary btn-user" ></a>
                                            </td>
                                          -->
                                        </tr>
                                        <?php
                                            $nomor++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <p><b>Notes</b></p>
                                <p>Rendah = 1</p>
                                <p>Tinggi = 2</p>

                              
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