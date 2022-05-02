<?php
include 'functions.php';
(isset($_SESSION['customer_id']) ? header('location: ticket') : "");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Kullanıcı Adı">
        <input type="password" password="password" placeholder="Şifreniz">
        <button type="submit" name="auth">Giriş Yap</button>
    </form>
</body>
</html>