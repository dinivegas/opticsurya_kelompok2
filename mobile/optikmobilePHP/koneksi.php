<?php 
//define your host
$HostName = "localhost";
//define your database username
$HostUser ="root";
//define your database password
$HostPass = "";
//define your database name
$DatabaseName ="optiksurya";

//create conec
$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);
//cek konek
if($conn->connect_error) {
	die("Connection failed:" .$conn->connect_error);
}

 ?>