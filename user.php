<?php
session_start();
require_once("php/ss-admin.php");
include("./php/echoHTML.php");
function hienthi()
{
    include("./php/conn.php");
  if(!$dbcon)
  {
      echo'
      <script>
          function abc(){
              if(confirm("Lỗi dữ liệu") == true){
                  window.location="../login.php";
              }else{
                  window.location="../login.php";
              }
          }
          abc();
      </script>
      ';
    
  }
  $output ="";
  $query = "SELECT `userid`, `First_name`, `Last_name`, `Password`, `Email`, `User_level` FROM `users` WHERE 1";
  $kq = mysqli_query($dbcon,$query); 
  while($row = mysqli_fetch_array($kq) )
  {
      $output .= '<tr><td>' .$row[1]. '</td><td>' .$row[2]. '</td><td>' .$row[4]. '</td><td>' .$row[3]. '</td><td>' .$row[5]. '</td><td><a href="./php/delete-user.php?id='.$row[0].'">Xóa</a></td></tr>';
  }
  mysqli_close($dbcon);
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
    <?php
    addNav();
    ?>
    <?php
    addSidebar("qltk");
    ?>
    <?php
    addUser();
    ?>
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
                    <form class="frm" id = "frm-newtk">
                        <div class="row">
                          <div class="col">
                            <div class="label">Họ</div>
                            <div class="value"><input type="text" name="ho"  size="15" maxlenght = "12" required></div>
                          </div>
                          <div class="col">
                            <div class="label">Tên</div>
                            <div class="value"><input type="text" name="ten"  size="12" maxlenght = "12" required></div>
                          </div>
                          <div class="col">
                            <div class="label">Email/Tên tài khoản</div>
                            <div class="value"><input type="text" name="user" size="20"required></div>
                          </div>					l
                          <div class="col">
                            <div class="label">Mật Khẩu</div>
                            <div class="value"><input type="text" name="pass" size="20" required></div>
                          </div>
                          <div class="col">
                            <div class="label">Quyền Truy cập</div>
                            <div class="value">
                                <select name="level" id="level">
                                  <option value="Admin">Admin</option>
                                  <option value="NhanVien">Nhân Viên</option>						
                                </select>
                            </div>
                        </div>			
                        <div class="btn-n">
                            <button id = "themtaokhoan" type="button" class="click">Thêm</button>
                        </div>
                        
                    </form>
                    
                    </div>
                    <div class="thongbao"></div>
                    <div class="bangdulieu">
                    <table class="table-data" bgcolor="#FFFFFF">
                      <tr id ="tb-khoa" class="row-first">
                      
                          <td width="300">Họ</td>
                          <td width="150">Tên</td>
                          <td width="300">Email</td>
                          <td width="300">Password</td>
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