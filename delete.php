<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    mysqli_set_charset($con, 'utf8');
    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    $productId = $_GET['id'];
    $query = "delete from products where id = $productId";
    mysqli_query($con, $query);
    header("location: http://localhost/MedicineStore/admin.php");
?>