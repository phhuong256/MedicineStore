<?php
    require "add-update-handler.php";
    if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['brand']) && isset($_GET["desc"]) && isset($_GET['price']) && isset($_GET['coverImg']) && isset($_GET['altImg1']) && isset($_GET['altImg2']) && isset($_GET['altImg3'])) {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $brand = $_GET['brand'];
        $desc = $_GET["desc"];
        $price = $_GET['price'];
        $coverImg = $_GET['coverImg'];
        $altImg1 = $_GET['altImg1'];
        $altImg2 = $_GET['altImg2'];
        $altImg3 = $_GET['altImg3'];
    }
    // echo "o22k";
    // echo $id . $name . $brand . $desc . $price . $coverImg . $altImg1 . $altImg2 . $altImg3;
    // die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/add-update.css">
</head>
<body>
    <div class="add-update-wrapper">
        <h1>Add,Update</h1>
        <form action="" method="POST">
            <h3 >ID</h3>
            <input type="number" readonly class="input" id="id-input"  name="id-input">
            <h3 >NAME</h3>
            <input type="text" class="input" id="name-input" name="name-input">
            <h3 >BRAND</h3>
            <input type="text" class="input" id="brand-input" name="brand-input">
            <h3 >DESCRIPTION</h3>
            <input type="text" class="input" id="des-input" name="des-input">
            <h3>PRICE</h3>
            <input type="text"  class="input" id="price-input" name="price-input">
            <h3>COVER IMG LINK</h3>
            <input type="text" class="input" id="cover-img-input" name="cover-img-input">
            <h3>ALT IMG1 LINK</h3>
            <input type="text" class="input" id="alt-img1-input" name="alt-img1-input">
            <h3>ALT IMG2LINK</h3>
            <input type="text" class="input" id="alt-img2-input" name="alt-img2-input">
            <h3>ALT IMG3 LINK</h3>
            <input type="text" class="input" id="alt-img3-input" name="alt-img3-input">
            <div class="btn-wrapper">
                <input type="submit" name="add-btn" class="button" value="ADD" >
                <input type="submit" name="update-btn" class="button" value="UPDATE" >
            </div>
        </form>
    </div>
</body>
<?php if (isset($id) && isset($name) && isset($brand) && isset($desc) && isset($price) && isset($coverImg) && isset($altImg1) && isset($altImg2) && isset($altImg3)) {?>
    <script>
        let idInput=document.getElementById("id-input")
        let nameInput=document.getElementById("name-input")
        let brandInput =document.getElementById("brand-input")
        let desInput = document.getElementById("des-input")
        let priceInput = document.getElementById("price-input")
        let coverImgInput =document.getElementById("cover-img-input")
        let altImg1Input =document.getElementById("alt-img1-input")
        let altImg2Input =document.getElementById("alt-img2-input")
        let altImg3Input =document.getElementById("alt-img3-input")
        idInput.value=  <?php echo json_encode($id) ?>;
        nameInput.value= <?php echo json_encode($name) ?>;
        brandInput.value= <?php echo json_encode($brand) ?>;
        desInput.value=<?php echo json_encode($desc) ?>;
        priceInput.value=<?php echo json_encode($price) ?>;
        coverImgInput.value=<?php echo json_encode($coverImg) ?>;
        altImg1Input.value=<?php echo json_encode($altImg1) ?>;
        altImg2Input.value=<?php echo json_encode($altImg2) ?>;
        altImg3Input.value=<?php echo json_encode($altImg3) ?>;
    </script>
<?php }?>
</html>