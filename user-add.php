<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
$level = $_POST['level'];
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "medicinedb";
// die();
// connect to db
$con = mysqli_connect($serverName, $userName, $password, $dbname);
mysqli_set_charset($con, 'utf8');
if(!$con)
{
    echo'
    <script>
        function abc(){
            if(confirm("Lỗi dữ liệu") == true){
                window.location="./admin.php";
            }else{
                window.location="./admin.php";
            }
        }
        abc();
    </script>
    '; 
}
else
{
    $query = "INSERT INTO `users`(`email`, `password`, `isAdmin`, `level`)  VALUES ('$user', '$pass', 0 ,'$level')";
    $kq = mysqli_query($con,$query);
    if($kq)
    {
        echo "Thêm <br>Create User : ".$user."<br> Thành Công";
    }
    else {
        echo "Thêm <br>Create User : ".$user."<br> That bai";
    }
}
//dong kn
mysqli_close($con);
?>