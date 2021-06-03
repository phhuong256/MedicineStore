<?php
    session_start();
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";

    if (!isset($_SESSION["admin"])) {
        header("Location:http://localhost:81/MedicineStore/admin-login.php");
    }
    //to force login whenever refresh page
    // session_unset();
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $itemPerPage = 5;
    $startFrom = ($page - 1) * $itemPerPage;
    // echo $startFrom;
    //this query is for couting all items and divine it by 5
    $query = "select * from products ";
    $res = mysqli_query($con, $query);
    $totalItem = mysqli_num_rows($res);
    $totalPage = ceil($totalItem / 5);
    // echo $totalPage;
    //query data from here
    $sql = "select * from products limit $startFrom,$itemPerPage";
    $sqlRes = mysqli_query($con, $sql);
    $arrData = mysqli_fetch_all($sqlRes);
    // die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
    <body>
        <section>
            <div class="row-container">
            <div class="manage-change" style="margin:20px 0px 20px 0px !important;display:flex ; justify-content:center;  ">
                    <a class="like-btn-style" href="./admin.php">USER</a>
                    <a class="like-btn-style" href="./bill.php" style="margin:0px 20px 0px 20px">BILL</a>
                    <a class="like-btn-style" href="./product.php">PRODUCTS</a>
                </div>
                <div class="row" >
             
                    <div class="">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col ">Id</th>
                                    <th class="name" scope="col">Tên sản phẩm</th>
                                    <th scope="col">Brand</th>
                                    <th class="des" scope="col">Mô tả</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Ảnh chính</th>
                                    <th scope="col">Ảnh phụ 1</th>
                                    <th scope="col">Ảnh phụ 2</th>
                                    <th scope="col">Ảnh phụ 3</th>
                                    <th scope="col">Chỉnh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($arrData as $key => $val) {?>
                                <tr>
                                    <td><?php echo $val[0] ?></td>
                                    <td><?php echo $val[1] ?></td>
                                    <td><?php echo $val[2] ?></td>
                                    <td><?php echo $val[3] ?></td>
                                    <td><?php echo $val[4] ?></td>
                                    <td><?php echo $val[5] ?></td>
                                    <td><?php echo $val[6] ?></td>
                                    <td> <?php echo $val[7] ?></td>
                                    <td> <?php echo $val[8] ?></td>
                                    <td>
                                        <ul>
                                            <li class="edit" ><a href="./add-update.php"  alt="">Thêm</a></li>
                                            <li class="edit" ><a href="./add-update.php?id=<?php echo $val[0] ?>&name=<?php echo $val[1] ?>&brand=<?php echo $val[2] ?>&desc=<?php echo $val[3] ?>&price=<?php echo $val[4] ?>&coverImg=<?php echo $val[5] ?>&altImg1=<?php echo $val[6] ?>&altImg2=<?php echo $val[7] ?>&altImg3=<?php echo $val[8] ?>"alt="">Sửa</a></li>
                                            <li class="edit" ><a href="./delete.php?id=<?php echo $val[0] ?>"alt="">Xóa</a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <div class="page-number-wrapper" >
            <?php
                for ($i = 1; $i <= $totalPage; $i++) {
                    echo "<a class='btn btn-success' href='./admin.php?page=$i '>$i </a>";
                }
            ?>
        </div>
    </body>
</html>
