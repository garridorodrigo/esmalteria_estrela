<?php
session_start();
require_once ('db.class.php');

$sql = "SELECT id, email FROM administrator "
        . " WHERE 1=1 "
        . "     AND  email = '" . $_POST['email'] . "'"
        . "     AND senha = MD5('" . $_POST['senha'] . "')";


$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id) {
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if (isset($dados_usuario['email'])) {

        $_SESSION['administrator']['id'] = $dados_usuario['id'];
        $_SESSION['administrator']['email'] = $dados_usuario['email'];
        
        header('Location:sistema/listarAgendamentoUser.php');
    } else {
        header('Location:login.php?erro=1');
    }
} else {
    echo "Erro na execução da consulta, favor entrar em contato com o Administrador do Sistema";
}
?>
