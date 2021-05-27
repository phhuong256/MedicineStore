<?php
    session_start();
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";

    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    if (isset($_POST['submit-btn'])) {
        $email = $_POST["input-email"];
        $password = $_POST["input-password"];
        $query = "select * from `users` where `email` = '$email' and `password` = '$password' ";
        if (mysqli_query($con, $query) == true) {
            $arrData = mysqli_fetch_all(mysqli_query($con, $query));
            if ($arrData[0][3] == 1) {
                $_SESSION["admin"] = $arrData[0][3];
                header("Location:./admin.php");
            } else if ($arrData[0][3] == 0) {
                echo "<h2 style=color:red; >WRONG EMAIL OR PASSWORD</h2>";
            }
        }
    }
?>