<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("location: http://localhost/");
    }
    $serverName = "localhost";
    $userName = "root";
    $password = "thanhnguyen314159";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    if(isset($_POST["delete"])) {
        $idUser = $_POST["idUser"];
        $id = $_POST["id"];
        $query = "delete from comment where id_user=$idUser and id_product=$id";
        $getComment = "select * from comment inner join users on comment.id_user=users.id where id_product='$id'";
        if (mysqli_query($con, $query)) {
            //
        }
        $queryGetComment = mysqli_query($con, $getComment);
        $arrayComment = array();
        while($row = mysqli_fetch_assoc($queryGetComment)) {
            $arrayComment[] = $row;
        }
        echo json_encode($arrayComment);
    }
?>