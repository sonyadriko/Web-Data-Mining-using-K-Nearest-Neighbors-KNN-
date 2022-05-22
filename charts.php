<?php
    include 'koneksi.php';
    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("hitung").click(function () {
                $("#hasilbaru").load();
            });
        });
    </script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Submit Data Testing</h1>
                            </div>
                            <form method="GET" action="charts.php">
                                <div class="form-group">
                                    <input type="number" name="inputage" class="form-control form-control-user" id="exampleAge"
                                        placeholder="Age">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="inputyear" class="form-control form-control-user" id="exampleYear"
                                        placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="inputaxillary" class="form-control form-control-user" id="exampleAxillary"
                                        placeholder="Axillary">
                                </div>
                                <div>
                                    <input type="number" name="inputk" class="form-control form-control-user" id="exampleK" placeholder="Parameter K" >
                                </div>
                                <br>

                               <input type="submit" class="btn btn-primary btn-user btn-block" id="btn01" name="hitung" value="Hitung">
                                <br>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                               <?php
                               if (isset($_GET['hitung'])) {

$agedata = $_GET['inputage'];
$yeardata = $_GET['inputyear'];
$axillarydata = $_GET['inputaxillary'];
$parak = $_GET['inputk'];              
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
                                        // }
                                      

                           
                                        ?>

                            <div id="hasilbaru">
                                <table class="table table-bordered" width="100%" cellspacing="0" >
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
                                               <th>Nomor</th>
                                               <th>Age</th>
                                               <th>Year</th>
                                               <th>Axillary</th>
                                               <th>Survival Status</th>
                                               <th>Euclidean</th>
                                               <th>Ranking</th>
                                           </tr>
                                       </thead>
                                       <?php
                                   
                                   
                                   for($i=0; $i<$parak; $i++){
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

                                       $arrayTelu = array_slice($array22, 0, $parak);
                                       $mati = array_filter($arrayTelu, function ($arrayItem) { 
                                       return $arrayItem->survival_status == 2;
                                       });
                                       $urip = array_filter($arrayTelu, function ($arrayItem) { 
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
                                               <td><?php echo sizeof($urip);?></td>
                                            </tr>
                                            <tr>
                                               <td>Died within 5 Years</td>
                                               <td><?php  echo sizeof($mati);?></td>
                                            </tr>
                                    </tbody>
                                    </table>

                                    <!-- <p>Mati = <?php  echo sizeof($mati);
                                     ?></p>
                                     <p>Urip = <?php  echo sizeof($urip);
                                     ?></p> -->

                                     <?php
                                       echo "Berdasarkan perhitungan, dengan age = ".$agedata.", year = ".$yeardata.", axillary = ".$axillarydata.", parameter K = ".$parak.", maka hasilnya: ";
                                     if (sizeof($mati) > sizeof($urip)) {
                                         // code...
                                       echo "<b>Maka Hasilnya Died within 5 Years</b>";
                                     }else {
                                       echo "<b>Maka Hasilnya Survived 5 Years or Longer</b>";
                                     }
 }
                                       ?>   
                                       </div>
                                  </div>
                              </div>
                              

                                <!-- </div>
                         
                     

    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- <script>
                             document.getElementById("btn01").addEventListener("click", function(){
                                    let a = document.getElementById("dataTable") || "null"

                                    a.style.display = "block";
                                });
                            </script> -->

</body>

</html>