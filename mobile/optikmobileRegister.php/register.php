<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'koneksi.php';

    $con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

    $Email = $_POST['email'];

    $Password = $_POST['password'];

    $Full_Name = $_POST['nama_pelanggan'];

    $Alamat = $_POST['alamat'];

    $Telepon = $_POST['telepon'];


    $CheckSQL = "SELECT * FROM pelanggan WHERE email='$Email'";

    $check = mysqli_fetch_array(mysqli_query($con, $CheckSQL));

    if (isset($check)) {

        echo 'Email Already Exist, Please Enter Another Email.';
    } else {
        $Sql_Query = "INSERT INTO pelanggan (email,password,nama_pelanggan,alamat,telepon) values ('$Email','$Password','$Full_Name','$Alamat','$Telepon')";

        if (mysqli_query($con, $Sql_Query)) {
            echo 'User Registration Successfully';
        } else {
            echo 'Something went wrong';
        }
    }
    mysqli_close($con);
}