<?php
function make_connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todoapp";
    $con = new mysqli($host, $username, $password, $dbname);
    if ($con->connect_error) {
        echo "There is an error in Database connection " . $con->connect_error;
    }
    return $con;
}


function add_items($value)
{
    session_start();
    $kullaniciadi = $_SESSION['kullaniciadi'];
    $con = make_connection();
    $query = "INSERT INTO todolist(id,item,status, username) VALUES(NULL,'$value','0', '$kullaniciadi')";
    $con->query($query);
}
function get_items()
{
    $con = make_connection();
    $kullaniciadi = $_SESSION['kullaniciadi'];
    $query = "SELECT id,item,datetime from todolist WHERE username='$kullaniciadi' AND status='0'";
    $result = $con->query($query);
    return $result;
}
function get_items_checked()
{
    $con = make_connection();
    $kullaniciadi = $_SESSION['kullaniciadi'];
    $query = "SELECT id,item,datetime from todolist WHERE username='$kullaniciadi' AND status='1'";
    $result = $con->query($query);
    return $result;
}
function update_items($id)
{
    $con = make_connection();
    $query = "UPDATE todolist set status='1' WHERE id='$id'";
    $result = $con->query($query);
}

function delete_items($id)
{
    $con = make_connection();
    $query = "DELETE from todolist WHERE id='$id'";
    $result = $con->query($query);
}

?>