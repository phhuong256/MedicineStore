<?php
    session_start();
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";

    if (!isset($_SESSION["admin"])) {
        header("Location:http://localhost/admin-login.php");
    }
    //to force login whenever refresh page
    // session_unset();
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);
    mysqli_set_charset($con, 'utf8');

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
    $query = "select * from bill ";
    $res = mysqli_query($con, $query);
    $totalItem = mysqli_num_rows($res);
    $totalPage = ceil($totalItem / 5);
    // echo $totalPage;
    //query data from here
    $sql = "select * from bill limit $startFrom,$itemPerPage";
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
                    <a class="like-btn-style" href="./admin.php">PRODUCTS</a>
                    <a class="like-btn-style" href="./bill.php" style="margin:0px 20px 0px 20px">BILL</a>
                    <a class="like-btn-style">USER</a>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				            <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export</button>
			        </form>
                </div>
                <div class="row"  style="width:1400px; justify-content: center;">
                   
                    <div class="">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col " style="width:100px">Id </th>
                                    <th class="name" style="min-width:150px" scope="col">Id người mua </th>
                                    <th scope="col" style="min-width:150px">Tên người mua</th>
                                    <th class="des" scope="col" style="width:100px">SĐT người mua</th>
                                    <th scope="col" style="min-width:150px">Địa chỉ người mua</th>
                                    <th scope="col" style="min-width:150px">Ngày mua</th>
                                    <th scope="col" style="min-width:150px">ngày dự kiến giao</th>
                                    <th scope="col" style="min-width:150px">Tổng số lượng hàng</th>
                    
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
                                    <td>
                                    <?php echo $val[7] ?>
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
