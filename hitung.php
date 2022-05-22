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
                                            <form method="GET" action="hitung.php">
                                                <table border="0" cellpadding="10" cellspacing="0">
                                                    <tr>
                                                        <td>Age : </td>
                                                        <td><input type="number" name="inputage" class="form-control form-control-user" id="exampleAge" style="-moz-appearance: textfield; " required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year : </td>
                                                        <td><input type="number" name="inputyear" class="form-control form-control-user" id="exampleYear" style="-moz-appearance: textfield;" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Axillary : </td>
                                                        <td><input type="number" name="inputaxillary" class="form-control form-control-user" id="exampleAxillary" style="-moz-appearance: textfield; " required></td>
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
                                    $agedata = $_GET['inputage'];
                                    $yeardata = $_GET['inputyear'];
                                    $axillarydata = $_GET['inputaxillary'];
                                    $kdata = $_GET['inputk'];

                                    class Euc{
                                        public $id_datatraining, $age, $year, $axillary, $survival_status;
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
                                        $id_datatraining = $display['id_datatraining'];
                                        $age = $display['age'];
                                        $year = $display['year'];
                                        $axillary = $display['axillary'];
                                        $survival_status = $display['survival_status'];
                                        $a = $age-$_GET['inputage'];
                                        $a2 = pow($a,2);
                                        $b = $year-$_GET['inputyear'];
                                        $b2 = pow($b,2);
                                        $c = $axillary-$_GET['inputaxillary'];
                                        $c2 = pow($c,2);
                                        $output = sqrt($a2+$b2+$c2);
                                        $eucli = new Euc();
                                        $eucli->id_datatraining = $id_datatraining;
                                        $eucli->age = $age;
                                        $eucli->year = $year;
                                        $eucli->axillary = $axillary;
                                        $eucli->survival_status = $survival_status;
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
                                            <td><?php echo $data->age ?></td>
                                            <td><?php echo $data->year ?></td>
                                            <td><?php echo $data->axillary ?></td>
                                            <td><?php if ($data->survival_status == 1) {
                                                echo "Survived 5 Years or Longer";
                                            }else if($data->survival_status == 2) {
                                                echo "Died within 5 Years";
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
                                               <th>Age</th>
                                               <th>Year</th>
                                               <th>Axillary</th>
                                               <th>Survival Status</th>
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
                                           <td><?php echo $data->age ?></td>
                                           <td><?php echo $data->year ?></td>
                                           <td><?php echo $data->axillary ?></td>
                                           <td><?php if ($data->survival_status == 1) {
                                               echo "Survived 5 Years or Longer";
                                           }else if($data->survival_status == 2) {
                                               echo "Died within 5 Years";
                                           } ?></td>
                                           <td><?php echo $data->euclidean ?></td>
                                           <td><?php echo $data->rank ?></td>
                                           </tr>
                                           <?php 
                                       }

                                       //mengambil data dengan total sesuai K yang diinput
                                       $arrayTelu = array_slice($array22, 0, $kdata);

                                       //jika meninggal dalam 5 tahun
                                       $mati = array_filter($arrayTelu, function ($arrayItem) { 
                                       return $arrayItem->survival_status == 2;
                                       });
                                       //jika hidup lebih dari 5 tahun
                                       $hidup = array_filter($arrayTelu, function ($arrayItem) { 
                                       return $arrayItem->survival_status == 1;
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
                                               <td>Survived 5 Years or Longer</td>
                                               <td><?php echo sizeof($hidup);?></td>
                                            </tr>
                                            <tr>
                                               <td>Died within 5 Years</td>
                                               <td><?php  echo sizeof($mati);?></td>
                                            </tr>
                                    </tbody>
                                    </table>


                                     <?php
                                       echo "Berdasarkan perhitungan, dengan age = ".$agedata.", year = ".$yeardata.", axillary = ".$axillarydata.", parameter K = ".$kdata.", maka hasilnya: ";
                                     if (sizeof($mati) > sizeof($hidup)) {
                                         // code...
                                       echo "<b>Maka Hasilnya Died within 5 Years</b>";
                                     }else if (sizeof($hidup) > sizeof($mati)) {
                                         // code...
                                        echo "<b>Maka Hasilnya Survived 5 Years or Longer</b>";
                                     }else{
                                       echo "<b>Maka Hasilnya Sama, perhitungan harus diulang dengan K harus ganjil</b>";
                                     }
 }
                                       ?>   
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