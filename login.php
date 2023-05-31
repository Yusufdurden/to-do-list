<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullaniciadi = $_POST["kullaniciadi"];
    $_SESSION["kullaniciadi"] = $kullaniciadi;

    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <h1 class="top-heading">TODO List Application</h1>
    <div class="login">
        <form action="./login.php" method="POST">
            <input type="text" name="kullaniciadi" id="kullaniciadi" placeholder="   Kullanıcı Adı giriniz">
            <button type="submit" id="loginbutton">LOGIN</button>
        </form>
    </div>
</body>

</html>