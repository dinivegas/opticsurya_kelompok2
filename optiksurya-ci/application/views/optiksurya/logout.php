<?php
session_start();

session_destroy();
echo "<script>alert('anda telah log out');</script>";
echo "<script>location='index.php';</script>";
?>