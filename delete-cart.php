<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    $id = $_GET['id'];
    $sql = "delete from `carts` where `id_product`=$id";
    if (mysqli_query($con, $sql) == true) {
        header("Location:http://localhost/shopping-cart.php");
    }
?>
