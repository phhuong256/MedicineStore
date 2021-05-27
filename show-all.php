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
    $brand = $_GET['brand'];
    // echo $brand;
    // die();
    $query = "select * from products where brand ='$brand'";
    $res = mysqli_query($con, $query);
    $arrData = mysqli_fetch_all($res);
    // echo "<pre>";
    // var_dump($arrData);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
        <!-- <link rel="stylesheet" href="./css/cart.css"> -->
        <link rel="stylesheet" href="./css/show-all.css">
        <link rel="stylesheet" href="./css/style.css">
        <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <!-- <script src="./js/slickUse.js"></script> -->
        <script src="./js/modal.js"></script>
        <script src="./js/index.js"></script>
        <!-- <script src="./js/user.js"></script> -->
        <link rel="stylesheet" href="./css/for-update.css">
    </head>
    <body>
        <div class="show-all-body-wrapper">
            <div id="myModal" class="modal">
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
            <!-- <div class="show-all-products"></div> -->
            <div class="show-all-text-decor"> ALL PRODUCTS </div>
            <ol class="ol-content show-all-products">
                <?php foreach ($arrData as $key => $value) {?>
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
        </div>
    </body>
    <script>
        <?php
            if ($_SESSION == null) {?>
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
