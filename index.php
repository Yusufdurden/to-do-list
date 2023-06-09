<?php
include("database.php");
session_start();
if ($_SESSION["kullaniciadi"] == null) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="title">
        <h1 class="top-heading">
            <?php echo $_SESSION["kullaniciadi"] ?>
            TODO List
        </h1>
        <a href="./session_sil.php">LOGOUT</a>
    </div>
    <div class="container">
        <form action="handleActions.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox">
                <button type="submit" name="add" id="add">ADD</button>
            </div>
            <ul class="list">
                <?php
                $itemList = get_items();
                while ($row = $itemList->fetch_assoc()) {
                    setlocale(LC_TIME, 'tr_TR.UTF-8');
                    $date = new DateTime($row["datetime"]);
                    ?>
                    <li class="item">
                        <p class="item-name">
                            <?php echo $row["item"]; ?>
                            <span>
                                <?php echo $date->format('d F Y H:i:s'); ?>
                            </span>
                        </p>
                        <div class="icon-container">
                            <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i
                                    class="fas fa-check-circle"></i></button>
                            <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <hr>
            <ul class="list">
                <?php
                $itemList = get_items_checked();
                while ($row = $itemList->fetch_assoc()) {
                    setlocale(LC_TIME, 'tr_TR.UTF-8');
                    $date = new DateTime($row["datetime"]);
                    ?>
                    <li class="item fade">
                        <p class="item-name deleted-text">
                            <?php echo $row["item"]; ?>
                            <span>
                                <?php echo $date->format('d F Y H:i:s'); ?>
                            </span>
                        </p>
                        <div class="icon-container">
                            <button type="submit" name="" id="check"><i class="fas fa-check-circle hidden"></i></button>
                            <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/4e07701ab0.js" crossorigin="anonymous"></script>
</body>

</html>