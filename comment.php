<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("location: http://localhost/");
    }
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }

    if(isset($_POST["comments"])) {
        $contents = $_POST["content"];
        $id = $_POST["id"];
        $queryI = "insert into comment(id_product, content, id_user) values(".$id.", '".$contents."', ".$_SESSION["email"].")";
        $queryU = "update comment set content='".$contents."' where id_product=".$id." and id_user=".$_SESSION["email"]."";
        $getComment = "select * from comment inner join users on comment.id_user=users.id where id_product='$id'";
        if (mysqli_query($con, $queryI)) {
            //
        } else if(mysqli_query($con, $queryU)) {
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