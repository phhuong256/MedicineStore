<?php
$id = $_GET['id'];
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
    $query = "DELETE FROM `users` WHERE `id` = '$id'";
    $kq = mysqli_query($con,$query); //truyen sql vao mysql
    $kq;
    header('location:./user.php');
}
//dong kn
mysqli_close($con);
?>