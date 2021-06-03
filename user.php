<?php
session_start();
    // if($_SESSION['level'] != "0") //phân quyền để chuyển trang
    // {
    // header('location:./admin.php');
    // }
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    mysqli_set_charset($con, 'utf8');
function hienthi()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    mysqli_set_charset($con, 'utf8');
//   if(!$con)
//   {
//       echo'
//       <script>
//           function abc(){
//               if(confirm("Lỗi dữ liệu") == true){
//                   window.location="./admin.php";
//               }else{
//                   window.location="./admin.php";
//               }
//           }
//           abc();
//       </script>
//       ';
    
//   }
  $output ="";
  $query = "SELECT `id`, `email`, `password`, `isAdmin`, `level` FROM `users` WHERE 1";
  $kq = mysqli_query($con,$query); 
  while($row = mysqli_fetch_array($kq) )
  {
      $output .= '<tr><td>' .$row[0]. '</td><td>' .$row[1]. '</td><td>' .$row[2]. '</td><td>' .$row[3]. '</td><td>' .$row[4]. '</td><td><a href="./delete-user.php?id='.$row[0].'">Xóa</a></td></tr>';
  }
  mysqli_close($con);
  return $output;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài Khoản</title>
    <link rel="stylesheet" href="./css/bt.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./linearicons/style.css">
    <script src="./js/style.js"></script>
    <script src="./js/fontawesome.min.js"></script>
    
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/navbar.js"></script>
    <script src="./js/xuly.js"></script>
    
</head>

<body>
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-head">
                        <h3 class="home-page">
                            Quản Lý Tài Khoản
                        </h3>
                    </div>
                    <div class="panel-body">
                    <form class="frm" id = "frm-newtk" method="POST" action="./user-add.php">
                        <div class="row">
                          <!-- <div class="col">
                            <div class="label">Họ</div>
                            <div class="value"><input type="text" name="ho"  size="15" maxlenght = "12" required></div>
                          </div>
                          <div class="col">
                            <div class="label">Tên</div>
                            <div class="value"><input type="text" name="ten"  size="12" maxlenght = "12" required></div>
                          </div> -->
                          <div class="col">
                            <div class="label">Email</div>
                            <div class="value"><input type="text" name="email" size="20"required></div>
                          </div>					
                          <div class="col">
                            <div class="label">Password</div>
                            <div class="value"><input type="text" name="password" size="20" required></div>
                          </div>
                          <div class="col">
                            <div class="label">Quyền Truy cập</div>
                            <div class="value">
                                <select name="level" id="level">
                                  <option value="1">Nhân Viên</option>						
                                </select>
                            </div>
                        </div>			
                        <div class="btn-n">
                            <button name="submit" id = "themtaokhoan" type="submit" class="click">Thêm</button>
                        </div>
                        
                    </form>
                    <?php
                    // if(isset($_POST["submit"])) {
                    //     $email = $_POST['email'];
                    //     $password = $_POST['password'];
                    //     $level = $_POST['level'];


                    //     $serverName = "localhost";
                    //     $userName = "root";
                    //     $password = "";
                    //     $dbname = "medicinedb";
                    //     $con = mysqli_connect($serverName, $userName, $password, $dbname);
                    //     mysqli_set_charset($con, 'utf8');


                    //     $query = "INSERT INTO `users`(`email`, `password`, `isAdmin`, `level`)  VALUES ('$user', '$pass', 0 ,'$level')";
                    //     header("location: ./user.php");
                    // }
                    ?>
                    </div>
                    <div class="thongbao"></div>
                    <div class="bangdulieu">
                    <table class="table-data" bgcolor="#FFFFFF">
                      <tr id ="tb-khoa" class="row-first">
                            <td width="150">Id</td>
                          <td width="300">Email</td>
                          <td width="150">Password</td>
                          <td width="300">isAdmin</td>
                          <td width="300">Level</td>
                          <td></td>
                      </tr>
                    <?php
                    echo hienthi();
                    ?>
                    
                </table>
                </div>
            </div>
        </div>
    </div>
<script>

</script>
</body>

</html>