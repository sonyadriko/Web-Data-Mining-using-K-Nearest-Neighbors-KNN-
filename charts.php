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
                            <form method="POST" action="charts_hasil.php">
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

    if (isset($_POST['hitung'])) {

        $age = $_POST['inputage'];
        $year = $_POST['inputyear'];
        $axillary = $_POST['inputaxillary'];
        $parak = $_POST['inputk'];

                                        
                                    
                        //    class Euc{
                        //                         public $id_datatraining, $age, $year, $axillary, $survival_status;
                        //                         public $eucledian;
                        //                         public $rank;
                        //                     }
                            

                        //                     $get_data = mysqli_query($conn, "select * from data_training");

                        //                     $rank = 0;
                        //                     $last_score = false;
                        //                     $rows = 0;
                        //                     $array22=array();
                        //                     $i = 0;

                        //                     while ($display=mysqli_fetch_array($get_data)) {
                        //                         // code...
                        //                         $id_datatraining = $display['id_datatraining'];
                        //                         $age = $display['age'];
                        //                         $year = $display['year'];
                        //                         $axillary = $display['axillary'];
                        //                         $survival_status = $display['survival_status'];
                        //                         $a = $age-$_GET['inputage'];
                        //                         $a2 = pow($a,2);
                        //                         $b = $year-$_GET['inputyear'];
                        //                         $b2 = pow($b,2);
                        //                         $c = $axillary-$_GET['inputaxillary'];
                        //                         $c2 = pow($c,2);
                        //                         $output = sqrt($a2+$b2+$c2);
                        //                         $eucli = new Euc();
                        //                         $eucli->id_datatraining = $id_datatraining;
                        //                         $eucli->age = $age;
                        //                         $eucli->year = $year;
                        //                         $eucli->axillary = $axillary;
                        //                         $eucli->survival_status = $survival_status;
                        //                         $eucli->euclidean = $output;
                        //                         $array22[$i] = $eucli;
                        //                         $i++;

                                            }
                                      

                               ?>
                           
                                        ?>
                                <!-- </div>
                         
                     

    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
                             document.getElementById("btn01").addEventListener("click", function(){
                                    let a = document.getElementById("dataTable") || "null"

                                    a.style.display = "block";
                                });
                            </script>

</body>

</html>