<?php

include 'koneksi.php';

if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];

    $query = "SELECT * FROM user WHERE emailaddress = '$emailaddress'";
    $result = $connect->query($query);

    // if($result->num_rows>0){
    //     $message = "Sorry.. Email already in use";
    // }else{
        $insertUser = "INSERT INTO user (`user_id`, `nama`, `email`, `password`, `alamat`, `no_hp`) VALUES (NULL, '$fullname', '$emailaddress', '$password', '$address', '$phonenumber')";

        $insertResult = mysqli_query($connect,$insertUser);

        if($insertResult){
            $message2 = "User registration complete"; 
            header("Location:login.php");
        }else{
            var_dump($insertResult);
            // die();
        }

    // }
}

?>