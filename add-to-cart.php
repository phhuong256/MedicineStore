<?php
    session_start();

    $idProduct = $_GET['id'];
    $priceProduct = $_GET['price'];
    $nameProduct = $_GET['name'];
    $imgProduct = $_GET['img'];
    // echo $imgProduct;
    // die();
    if (isset($_SESSION["email"])) {
        $idUser = $_SESSION["id"];
        // echo $id;
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbname = "medicinedb";
        // die();
        // connect to db
        $con = mysqli_connect($serverName, $userName, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "failed to connect";
        }
        $sql = "insert into `carts`( `id_product`, `id_user`, `Product_name`, `Product_img`, `Product_price`)  values ('$idProduct' , '$idUser','$nameProduct','$imgProduct','$priceProduct')";
        if (mysqli_query($con, $sql) == true) {
            header("location: http://localhost/shopping-cart.php");
        } else {
            // echo "No";
            // echo $sql;
        }
    } else {
        header("location: http://localhost/index.php");
    }
?>
