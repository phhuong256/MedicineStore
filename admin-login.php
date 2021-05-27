<?php
    require "admin-login-handler.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin-login.css">
</head>
<body>
    <div class="log-in-container">
        <form class="log-in-wrapper"  method="POST">
            <h2>LOG IN</h2>
            <input placeholder="Email" name="input-email" class="log-in-input log-in-mail email" type="email">
            <br>
            <input placeholder="Password" name="input-password" class="log-in-input log-in-pass password" type="password" >
            <br>
            <input  type="submit" name="submit-btn" class="admin-log-in-btn" >
        </form>
    </div>
</body>
</html>