<?php
  $name= $_POST["name"];
  $phone = $_POST["phone"];
  $address= $_POST['address'];
  
  $total = $_GET['total'];
  $userId = $_GET['userId'];
  print_r($_POST); 
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $dbname = "medicinedb";
  // connect to db
  $con = mysqli_connect($serverName, $userName, $password, $dbname);
  
  if (mysqli_connect_errno()) {
    echo "failed to connect";
}
  $sql="insert into `bill`(`id_user`, `user_name`, `user_phone`, `address`, `date_created`, `date_arrived`, `total`) values ('$userId','$name','$phone','$address',CURDATE() ,DATE_ADD(CURDATE(), INTERVAL 5 DAY) , '$total')";
  if (mysqli_query($con, $sql) == true) {
    header("location: ./index.php");
    // echo"âd";
}


  // echo $userId,$total

  
?>