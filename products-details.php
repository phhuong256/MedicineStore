<?php
    session_start();
    if (isset($_SESSION["email"])) {
        // echo "ok";
    }
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname = "medicinedb";
    // connect to db
    $con = mysqli_connect($serverName, $userName, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "failed to connect";
    }
    $productId = $_GET['id'];
    $query = "select * from products where id = $productId ";
    $res = mysqli_query($con, $query);
    $arrData = mysqli_fetch_all($res);

    $brand = $_GET['brand'];
    $suggestQuery = "select * from products where brand = '$brand' order by id desc limit 4";
    $suggestRes = mysqli_query($con, $suggestQuery);
    $suggestData = mysqli_fetch_all($suggestRes);

    // echo "<pre>";
    // var_dump($suggestData);
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
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <link rel="stylesheet" href="./css/product-details.css">
    <script src="./js/slickUse.js"></script>
    <script src="./js/modal.js"></script>
    <script src="./js/index.js"></script>
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
                    <h2 class="modal-title" >Log In</h2>
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
        <div class="product-decor">PRODUCT</div>
        <div class="line-decor"></div>
        <div class="product-detail-wrapper">
            <div class="product">
                <div class="product-imgs-wrapper">
                    <img class="main-img" src="<?php echo $arrData[0][5] ?>" alt="">
                    <ol class="flex-imgs">
                        <li class="alt-img"><img src="<?php echo $arrData[0][5] ?>" alt=""></li>
                        <li class="alt-img"><img src="<?php echo $arrData[0][7] ?>" alt=""></li>
                        <li class="alt-img"><img src="<?php echo $arrData[0][6] ?>" alt=""></li>
                        <li class="alt-img"><img src="<?php echo $arrData[0][8] ?>jpg" alt=""></li>
                    </ol>
                </div>
                <div class="description-wrapper">
                    <div class="description-title"><?php echo $arrData[0][1] ?></div>
                    <div class="description-price">Price: <?php echo $arrData[0][4] ?> VND</div>
                    <div class="description-text"><?php echo $arrData[0][3] ?></div>
                    <div class="description-buy-container">
                        <a href="./add-to-cart.php?id=<?php echo $arrData[0][0] ?>&name=<?php echo $arrData[0][1] ?>&img=<?php echo $arrData[0][5] ?>&price=<?php echo $arrData[0][4] ?>" class="buy-now">
                        SHOP NOW</a>
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>
            </div>
            <div class="line-decor"></div>
            <div class="suggestion-wrapper">
                <div class="suggestion-text">
                    YOU MAY ALSO LIKE
                </div>
                <div class="suggestion-content">
                    <ol class="suggestion-ol-content">
                    <?php foreach ($suggestData as $key => $value) {?>
                        <li class="suggestion-li-content">
                            <div class="suggestion-content-detail-wrapper">
                                <img src="<?php echo $value[5] ?>" class="content-img">
                                <a class="suggestion-product-detail" href="./products-details.php?id=<?php echo $value[0] ?>" >
                                    <div class="product-name"><?php echo $value[1] ?></div>
                                    <div class="product-bot-border">----</div>
                                    <div class="product-price"><?php echo $value[4] ?> VND</div>
                                </a>
                            </div>
                        </li>
                    <?php }?>
                    </ol>
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
        <a href="#landing-page" id="mybutton">
            <div class="to-top"><i class="fas fa-arrow-up"></i></div>
        </a>
        <div class="media-container">
            <div class="media-text"> <span>Follow me</span> </div>
            <div class="facebook">
                <i class="fab fb-ig fa-facebook"></i>
                <i class="fab fb-ig fa-instagram"></i>
            </div>
        </div>

        <div class="signature-bar">© 2020 by An. Proudly created with html css and js

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