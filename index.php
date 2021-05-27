<?php
session_start();
if (isset($_SESSION["email"])) {
    // echo "ok";
}
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "medicinedb";
// die();
// connect to db
$con = mysqli_connect($serverName, $userName, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "failed to connect";
}
$query = "select * from products where brand = 'familyHealth' order by id desc  limit 5 ";
$bagsRes = mysqli_query($con, $query);
$bagsArrData = mysqli_fetch_all($bagsRes);

$sql = "select * from products where brand = 'medicalBed' order by id desc  limit 5 ";
$lipsRes = mysqli_query($con, $sql);
$lipsArrData = mysqli_fetch_all($lipsRes);
// echo "<pre>";
// var_dump($arrData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Store</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css" />
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f38de2a0a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/for-update.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="./js/slickUse.js"></script>
    <!-- <script src="./js/user.js"></script> -->
    <script src="./js/index.js"></script>
    <script src="./js/modal.js"></script>
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
                        <input type="button" class="submit-btn log-in-btn" name=""  value="Log In">
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
                <a class="navbar-brand" href="">
                    <div class="logo-image">
                        <img src="./images/logo-png-transparent.png" class="img-fluid">
                    </div>
                </a>
                <div class="ol-li-container">
                    <ol class="li-content-container">
                        <li><a id="to-content" href="#content-wrapper">Shop</a></li>
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
        <div id="landing-page" class="landing-page-wrapper section">
            <img class="img-landing-page" src="./images/landing.jpg" alt="">
            <div class="explore-now">
                <a class="explore-now-text" href="#content-wrapper">EXPLORE NOW</a>
            </div>
        </div>
        <div class="line-decor"></div>
        <div id="content-wrapper" class="content-wrapper section">
            <div class="section-img-wrapper"><img class="section-img" src="" alt=""> NEWEST BAGS </div>
            <ol class="ol-content">
                <?php foreach ($bagsArrData as $key => $value) {?>
                <li class="li-content-details">
                    <div class="content-details">
                        <div class="product-image">
                            <img src="<?php echo $value[5] ?>" class="content-img">
                            <div class="add-to-cart">
                                <div class="add-btn">ADD TO CART</div>
                            </div>
                        </div>
                        <a class="product-details" href="./products-details.php?id=<?php echo $value[0] ?>&brand=<?php echo $value[2] ?>">
                            <div class="product-name"><?php echo $value[1] ?></div>
                            <div class="product-bot-border"></div>
                            <div class="product-price"><?php echo $value[4] ?></div>
                        </a>
                    </div>
                </li>
                <?php }?>
            </ol>
            <a href="./show-all.php?brand=familyHealth" class="show-all" >See More <i class="fas fa-caret-down"></i> </a>
        <div class="line-decor"></div>
            <div class="section-img-wrapper"><img class="section-img" src="" alt=""> NEWEST LIPSTICKS </div>
            <ol class="ol-content">
            <?php foreach ($lipsArrData as $key => $value) {?>
                <li class="li-content-details">
                    <div class="content-details">
                        <div class="product-image">
                            <img src="<?php echo $value[5] ?>" class="content-img">
                            <div class="add-to-cart">
                                <div class="add-btn">ADD TO CART</div>
                            </div>
                        </div>
                        <a class="product-details" href="./products-details.php?id=<?php echo $value[0] ?>&brand=<?php echo $value[2] ?>">
                            <div class="product-name"><?php echo $value[1] ?></div>
                            <div class="product-bot-border"></div>
                            <div class="product-price"><?php echo $value[4] ?></div>
                        </a>
                    </div>
                </li>
                <?php }?>
            </ol>
            <a href="./show-all.php?brand=medicalBed" class="show-all" >See More <i class="fas fa-caret-down"></i> </a>
        </div>
        <div class="line-decor"></div>
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
                    <div class="contact-number-info">Email:medicinestore@gmail.com</div>
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
        <div class="signature-bar">© 2020 by CSE481-60TH5.G1-Thuy Loi University
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
