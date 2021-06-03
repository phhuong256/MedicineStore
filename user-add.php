<?php
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "medicinedb";
// die();
// connect to db
$con = mysqli_connect($serverName, $userName, $password, $dbname);
mysqli_set_charset($con, 'utf8');
    
    $query = "INSERT INTO `users`(`email`, `password`, `level`)  VALUES (`$email`,`$password`,`$level`)";
    $kq = mysqli_query($con,$query);
mysqli_close($con);
header("location: ./user.php");
?>