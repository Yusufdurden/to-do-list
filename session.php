<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
    session_start();

    $_SESSION["kullaniciAdi"]= "ysfylmz";
    $_SESSION["isim"]= "Yusuf";
    $_SESSION["dogumTarihi"]= "11 Nisan 2003";

    echo "Adınız :" . $_SESSION["isim"] . "<br />";
    echo "Kullanıcı Adı : " . $_SESSION["kullaniciAdi"] . "<br />";
    echo "Doğum Tarihi :" . $_SESSION["dogumTarihi"] . "<br />";

    echo "<a href='session_sil.php'>Session Sil<a>"


    ?>

</body>
</html>