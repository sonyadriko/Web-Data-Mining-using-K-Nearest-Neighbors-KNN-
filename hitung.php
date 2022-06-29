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

    <title>Hitung KNN</title>

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
        input{
            color : #000000;
        }
 

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("hitung").click(function () {
                $("#hasilbaru").load();
            });
        });
    </script>
    
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
                    <!-- <h1 class="h3 mb-2 text-gray-800">Perhitungan KNN</h1> -->
                  <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
 -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data testing</h6>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-12 col-md-9">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <form method="GET" action="hitung.php">
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
                                                        <td>Parameter K : </td>
                                                        <td><input type="number" name="inputk" class="form-control form-control-user" id="exampleK" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="hitung.php" style="text-decoration: none; list-style: none;"><input type="button" class="btn btn-primary btn-user btn-block" value="Reset"></a></td>
                                                        <td><input type="submit" class="btn btn-primary btn-user btn-block" id="hitung" name="hitung" value="Hitung"></td>
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

                            <?php
                                if(isset($_GET['hitung'])){
                                    $branddata = $_GET['inputbrand'];
                                    $jenisdata = $_GET['inputjenis'];
                                    $bahandata = $_GET['inputbahan'];
                                    $hargadata = $_GET['inputharga'];
                                    $bintangdata = $_GET['inputbintang'];
                                    $terjualdata = $_GET['inputterjual'];
                                    $kdata = $_GET['inputk'];

                                    class Euc{
                                        public $id_datatraining, $brand, $jenis, $bahan, $harga, $bintang, $terjual, $penjualan;
                                        public $eucledian;
                                        public $rank;
                                    }
       
                                    $get_data = mysqli_query($conn, "select * from data_training");

                                    $rank = 0;
                                    $last_score = false;
                                    $rows = 0;
                                    $array22=array();
                                    $i = 0;

                                    while ($display=mysqli_fetch_array($get_data)) {
                                        // code...
                                        $id_data = $display['id_data'];
                                        $brand = $display['brand'];
                                        $jenis = $display['jenis'];
                                        $bahan = $display['bahan'];
                                        $harga = $display['harga'];
                                        $bintang = $display['bintang'];
                                        $terjual = $display['terjual'];
                                        $penjualan = $display['penjualan'];
                                        $a = $brand-$branddata;
                                        $a2 = pow($a,2);
                                        $b = $jenis-$jenisdata;
                                        $b2 = pow($b,2);
                                        $c = $bahan-$bahandata;
                                        $c2 = pow($c,2);
                                        $d = $harga-$hargadata;
                                        $d2 = pow($d,2);
                                        $e = $bintang-$bintangdata;
                                        $e2 = pow($e,2);
                                        $f = $terjual-$terjualdata;
                                        $f2 = pow($f,2);
                                        $output = sqrt($a2+$b2+$c2+$d2+$e2+$f2);
                                        $eucli = new Euc();
                                        $eucli->id_datatraining = $id_data;
                                        $eucli->brand = $brand;
                                        $eucli->jenis = $jenis;
                                        $eucli->bahan = $bahan;
                                        $eucli->harga = $harga;
                                        $eucli->bintang = $bintang;
                                        $eucli->terjual = $terjual;
                                        $eucli->penjualan = $penjualan;
                                        $eucli->euclidean = $output;
                                        $array22[$i] = $eucli;
                                        $i++;

                                    }

                                
                            ?>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                        </div>
            <div id="hasilbaru">
                <div class="card-body">
                    <div >
                        <div >
                            <div >
                                <div>
                                <table class="table table-bordered" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Brand</th>
                                            <th>Jenis</th>
                                            <th>Bahan</th>
                                            <th>Harga</th>
                                            <th>Bintang</th>
                                            <th>Terjual</th>
                                            <th>Penjualan</th>
                                            <th>Euclidean</th>
                                            <th>Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    

                                            usort($array22, function($a, $b)
                                            {
                                                return $a->euclidean > $b->euclidean;
                                            });


                                            function comparator($object1, $object2){
                                                return $object1->euclidean > $object2->euclidean;
                                            }

                                            for ($i=0; $i < sizeOf($array22); $i++) {

                                                $data = $array22[$i];
                                                $data->rank = 1+$i;
                                        ?>

                                        <tr>
                                            <td><?php echo $data->id_datatraining ?></td>
                                            <td><?php echo $data->brand ?></td>
                                            <td><?php echo $data->jenis ?></td>
                                            <td><?php echo $data->bahan ?></td>
                                            <td><?php echo $data->harga ?></td>
                                            <td><?php echo $data->bintang ?></td>
                                            <td><?php echo $data->terjual ?></td>
                                            <td><?php if ($data->penjualan == 1) {
                                                echo "Rendah";
                                            }else if($data->penjualan == 2) {
                                                echo "Tinggi";
                                            } ?></td>
                                            <td><?php echo $data->euclidean ?></td>
                                            <td><?php echo $data->rank ?></td>
                                        </tr>
                                        <?php
                                            // $nomor++;
                                            }

                                        ?>
                                    </tbody>
                                </table>

                                <div>
                                    
                                    <table class="table table-bordered" id="2" width="100%" cellspacing="0">
                                       <thead>
                                           <tr>
                                                <th>Id</th>
                                                <th>Brand</th>
                                                <th>Jenis</th>
                                                <th>Bahan</th>
                                                <th>Harga</th>
                                                <th>Bintang</th>
                                                <th>Terjual</th>
                                                <th>Penjualan</th>
                                                <th>Euclidean</th>
                                                <th>Ranking</th>
                                           </tr>
                                       </thead>
                                       <?php
                                   
                                   
                                   for($i=0; $i<$kdata; $i++){
                                       $data = $array22[$i];
                                       $data->rank = 1+$i;
                                       

                                    ?>
                                       <tbody>
                                           <tr>
                                           <td><?php echo $data->id_datatraining ?></td>
                                            <td><?php echo $data->brand ?></td>
                                            <td><?php echo $data->jenis ?></td>
                                            <td><?php echo $data->bahan ?></td>
                                            <td><?php echo $data->harga ?></td>
                                            <td><?php echo $data->bintang ?></td>
                                            <td><?php echo $data->terjual ?></td>
                                            <td><?php if ($data->penjualan == 1) {
                                                echo "Rendah";
                                            }else if($data->penjualan == 2) {
                                                echo "Tinggi";
                                            } ?></td>
                                           <td><?php echo $data->euclidean ?></td>
                                           <td><?php echo $data->rank ?></td>
                                           </tr>
                                           <?php 
                                       }

                                       //mengambil data dengan total sesuai K yang diinput
                                       $arrayTelu = array_slice($array22, 0, $kdata);

                                       //jika Tinggi
                                       $tinggi = array_filter($arrayTelu, function ($arrayItem) { 
                                       return $arrayItem->penjualan == 2;
                                       });
                                       //jika Rendah
                                       $rendah = array_filter($arrayTelu, function ($arrayItem) { 
                                       return $arrayItem->penjualan == 1;
                                       });

                                    ?>
                                       </tbody>
                                   </table>

                                   <table class="table table-bordered" id="2" width="100%" cellspacing="0">
                                       <thead>
                                           <tr>
                                               <th>Hasil</th>
                                               <th>Total</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>Tinggi</td>
                                               <td><?php echo sizeof($tinggi);?></td>
                                            </tr>
                                            <tr>
                                               <td>Rendah</td>
                                               <td><?php  echo sizeof($rendah);?></td>
                                            </tr>
                                    </tbody>
                                    </table>

                                       <p>Berdasarkan perhitungan, dengan brand = <?php echo $branddata ?>, jenis = <?php echo $jenisdata ?>, bahan = <?php echo $bahandata ?>, harga = <?php echo $hargadata ?>, bintang = <?php echo $bintangdata ?>, terjual = <?php echo $terjualdata ?>, parameter K = <?php echo $kdata ?>, maka hasilnya : 
                                     <?php
                                    //    echo  "Berdasarkan perhitungan, dengan brand = ".$branddata.", jenis = ".$jenisdata.", bahan = ".$bahandata.", harga = " .$hargadata.", bintang = " .$bintangdata.", terjual = " .$terjualdata.", parameter K = ".$kdata.", maka hasilnya: ";
                                     if (sizeof($rendah) > sizeof($tinggi)) {
                                         // code...
                                       echo "<b>Rendah</b>";
                                     }else if (sizeof($tinggi) > sizeof($rendah)) {
                                         // code...
                                        echo "<b>Tinggi</b>";
                                     }else{
                                       echo "<b>Maka Hasilnya Sama, perhitungan harus diulang dengan K harus ganjil</b>";
                                     }
 }
                                       ?>   
                                       </p>
                                       </div>
                                  </div>
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