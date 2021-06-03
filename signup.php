<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    mysqli_set_charset($con, 'utf8');
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        // echo $password;
        $sql = "insert into `users`( `email`, `password`, `isAdmin`)  values ('$email' , '$password', 0) ";
        if (mysqli_query($con, $sql) == true) {
            echo "You are now our member";
        }
        // echo $sql;
        // $userInfo = mysqli_fetch_all($result);
        // $isUser = mysqli_num_rows($result);
        // if ($isUser > 0) {
        //     $_SESSION["email"] = $userInfo[0][1];
        //     echo $userInfo[0][1];

        // }
    }
?>