<?php

session_start();
require_once 'db.class.php';

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "INSERT INTO administrator(senha, email) "
        . "VALUES ("
        . " MD5('" . $_POST['senha'] . "')"
        . ", '" . $_POST['email'] . "'"
        . ")";

if (mysqli_query($link, $sql)) {
    header('location:login_administrator.php');
} else {
    echo "Erro ao registrar o usuário!";
}
?>

