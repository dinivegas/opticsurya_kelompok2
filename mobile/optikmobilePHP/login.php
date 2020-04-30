<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'koneksi.php';

    $con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

    $Email = $_POST['email'];

    $Password = $_POST['password'];

    $Sql_Query = "SELECT * FROM pelanggan WHERE email='$Email' and password ='$Password'";

    $check = mysqli_fetch_array(mysqli_query($con, $Sql_Query));

    if (isset($check)) {

        echo 'Data Matched';
    } else {
        echo "Invalid Username Or Password Try Again !";
    }

    mysqli_close($con);
}