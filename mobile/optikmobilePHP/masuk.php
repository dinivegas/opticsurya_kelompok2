<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'connect.php';

    $sql = "SELECT * FROM pelanggan WHERE email='$email' AND password ='$password' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        if ($password==$row['password']) {
            
            $index['nama_pelanggan'] = $row['nama_pelanggan'];
            $index['telepon'] = $row['telepon'];
            $index['alamat']= $row['alamat'];
            $index['id_pelanggan'] = $row['id_pelanggan'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            echo "Invalid Username Or Password Try Again !";

        }

    }

}

?>