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
    if (isset($_POST["add-btn"])) {
        $id = $_POST['id-input'];
        $name = $_POST['name-input'];
        $brand = $_POST["brand-input"];
        $desc = $_POST['des-input'];
        $price = $_POST['price-input'];
        $coverImg = $_POST['cover-img-input'];
        $altImg1 = $_POST['alt-img1-input'];
        $altImg2 = $_POST['alt-img2-input'];
        $altImg3 = $_POST['alt-img3-input'];
        $sql = "insert into `products`(`name`, `brand`, `description`, `price`, `coverImg`, `altImg1`, `altImg2`, `altImg3`) values ('$name','$brand','$desc','$price','$coverImg','$altImg1','$altImg2','$altImg3')";
        if (mysqli_query($con, $sql) == true) {
            header("location:http://localhost/admin.php");
        } else {
            echo "<h2 style=color:red; >ERROR</h2>";

        }
    }
    if (isset($_POST['update-btn'])) {
        $id = json_decode($_POST['id-input']);
        // echo gettype($id);
        $name = $_POST['name-input'];
        $brand = $_POST["brand-input"];
        $desc = $_POST['des-input'];
        $price = $_POST['price-input'];
        $coverImg = $_POST['cover-img-input'];
        $altImg1 = $_POST['alt-img1-input'];
        $altImg2 = $_POST['alt-img2-input'];
        $altImg3 = $_POST['alt-img3-input'];
        $query = "update `products` set `name`='$name',`brand`='$brand',`description`='$desc',`price`='$price',`coverImg`='$coverImg',`altImg1`='$altImg1',`altImg2`='$altImg2',`altImg3`='$altImg3' WHERE id=$id";
        if (mysqli_query($con, $query) == true) {
            header("location:http://localhost/admin.php");
        } else {
            echo "<h2 style=color:red; >ERROR</h2>";
        }
    }
?>