<?php
    session_start();
    $total=0;
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    if (isset($_SESSION["email"])) {
        $userId = $_SESSION["id"];
        // echo $userId;
        $sql = "select * from `carts` where `id_user` = '$userId'";
        $res = mysqli_query($con, $sql);
        $arrData = mysqli_fetch_all($res);
    }
    // $idProduct = $arrData[0][0];
    // $getProduct = "select * from `products` where `id`=$idProduct ";
    // $productRes = mysqli_query($con, $getProduct);
    // $arrProduct = mysqli_fetch_all($productRes);
    // echo "<pre>";
    // var_dump($arrData);
    // die();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css" />
        <link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/f38de2a0a5.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" type="text/css" href="slick/slick.css" />
        <link rel="stylesheet" href="./css/cart.css">
        <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script src="./js/slickUse.js"></script>
        <script src="./js/modal.js"></script>
        <script src="./js/index.js"></script>
        <script src="./js/billmodal.js"></script>
        <!-- <script src="./js/user.js"></script> -->
        <link rel="stylesheet" href="./css/for-update.css">
    </head>
    <body>
        <div class="body-wrapper">
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2 class="modal-title">Log In</h2>
                    </div>
                    <div class="modal-body">
                        <form class="log-in-wrapper"  action="">
                                <input placeholder="Email" class="log-in-input log-in-mail email" type="email">
                            <br>
                                <input placeholder="Password" class="log-in-input log-in-pass password" type="password" >
                            <br>
                            <input type="button" class="submit-btn log-in-btn" name="" value="Log In">
                            <div class="error">Wrong email or password</div>
                            <div class="link-sign-up">Don't Have Account? Sign Up Here</div>
                        </form>
                        <form class="sign-up-wrapper" action="">
                            <input placeholder="Email" class="sign-up-input sign-up-mail email" type="email">
                            <br>
                                <input placeholder="Password" class="sign-up-input sign-up-pass password" type="password" >
                            <br>
                            <input type="button" class="submit-btn sign-up-btn" name="" value="Sign Up">
                            <div class="success">Thank you for sign up, plase log in now.</div>
                            <div class="link-log-in">Already Have An Account? Log In Here</div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="nav-bar-wrapper">
            <div class="nav-bar-container">
                <a class="navbar-brand" href="./index.php">
                    <div class="logo-image">
                        <img src="./images/logo-png-transparent.png" class="img-fluid">
                    </div>
                </a>
                <div class="ol-li-container">
                    <ol class="li-content-container">
                        <li><a id="to-content" href="./index.php">Shop</a></li>
                        <li><a>Products</a></li>
                        <li><a href="#footer-wrapper">About</a></li>
                        <li><a href="#footer-wrapper">FAQ</a></li>
                        <li><a href="#footer-wrapper">Contact</a></li>
                    </ol>
                </div>
                <div id="myBtn"><i class="fas fa-user-circle"></i></div>
                <a class="myCart" href="./shopping-cart.php"></a>
                <!-- <div class="nav-button-container">
                    <button id="Modal-btn-trigger">Open Modal</button>

                </div> -->
            </div>
        </div>
        <div class="cart-decor">SHOPPING CART</div>
        <div class="line-decor"></div>
        <?php
            if (isset($_SESSION["email"])) {
                foreach ($arrData as $key => $value) {
        ?>
            <div class="cart-items-wrapper">
                <!-- <div class="cart-items-left-wrapper"> -->
                    <div class="cart-items-left">
                        <a class="cart-img-wrapper" href="./products-details.php?id=<?php echo $value[0] ?>">
                            <img class="cart-img" src="<?php echo $value[3] ?>" alt="">
                        </a>
                        <div class="cart-item-detail">
                            <a href="./products-details.php?id=<?php echo $value[0] ?>" class="cart-item-name"><?php echo $value[2] ?></a>
                            <div class="cart-item-price"><?php echo $value[4] ?> VND</div>
                        </div>
                    </div>
                    <div class="cart-items-right">
                        <a href="./delete-cart.php?id=<?php echo $value[0] ?>" class="cart-item-delete">X</a>
                    </div>
            </div>
           <?php $total= ($total +floatval($value[4]) *1000000 ); ?> 

        <?php }}?>
        <div id="billModalToggle" style="display: block;
    border-radius: 2px;
    font-size: 24px;
    width: 200px;
    text-align: center;
    margin: 29px auto;
    height: 55px;
    outline: none;
    border: none;
    line-height: 2.5;
    background-color: #ffc83c !important;
    color: white;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);"  href="">Thanh toán</div>
    <div id="billModal" class="modal">
    <!-- Modal content -->
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="billModalClose" style="    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;">&times;</span>
            <h2 class="modal-title">Phiếu Mua Hàng</h2>
        </div>
        <div class="modal-body">
            <form class="bill-wrapper" method="post" action="./bill-add.php?total=<?php$total?>&userId=">
                    <input  class="billstyle" placeholder="Họ Và Tên" name="name"  type="text">
                <br>
                    <input  placeholder="Số Điện Thoại" class="billstyle" name="phone" type="number"  >
                <br>
                <input placeholder="Địa chỉ đặt hàng" class="billstyle" name="address" type="text" >
    <br>
                <input type="submit" name="checkout-submit" class="" value="Đặt Hàng" style="display: block;
                    border-radius: 2px;
                    font-size: 24px;
                    width: 200px;
                    text-align: center;
                    margin: 29px auto;
                    height: 55px;
                    outline: none;
                    border: none;
                    line-height: 2.5;
                    background-color: #ffc83c !important;
                    color: white;
                    box-shadow: 0 0 10px rgb(0 0 0 / 10%);">
                
                </input>
            </form>
        </div>
    </div>
</div>
        <div class="footer-wrapper" id="footer-wrapper">
            <div class="footer-container">
                <!-- <div class="contact-details"> -->
                <div class="left-footer">
                    <div class="shipping-store-payment footer-title">Shipping & Returns</div>
                    <div class="shipping-store-payment">Store Policy</div>
                    <div class="shipping-store-payment">Payment Methods</div>
                </div>
                <div class="center-footer">
                    <div class="contact-number-info footer-title">Contact</div>
                    <div class="contact-number-info">Tel:0584681228</div>
                    <div class="contact-number-info">Email:ngoclinhh0105@gmail.com</div>
                </div>
                <div class="right-footer ">
                    <div class="fb-ig-pt footer-title">Facebook</div>
                    <div class="fb-ig-pt">Instagram</div>
                    <div class="fb-ig-pt">Pinterest</div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="media-container">
            <div class="media-text"> <span>Follow me</span> </div>
            <div class="facebook">
                <i class="fab fb-ig fa-facebook"></i>
                <i class="fab fb-ig fa-instagram"></i>
            </div>
        </div>
        <div class="signature-bar">© created with html css and js
        </div>
    </div>
    </body>
    <script>
        <?php if ($_SESSION == null) {?>
            let email="";
            <?php } else {?>
            let email= <?php echo json_encode($_SESSION["email"]) ?>;
        <?php }?>
        if(email.length>0){
            let formLogIn = document.getElementsByClassName("log-in-wrapper")[0];
            let modalTitle = document.getElementsByClassName("modal-title")[0];
            let modalBody = document.getElementsByClassName("modal-body")[0];
            modalTitle.textContent= "Hello" +"     "+ email;
            formLogIn.style.display = "none";
            modalBody.innerHTML=`<a class="btn-sign-out" href="./sign-out.php">Sign Out</a>`
        }
    </script>
</html>