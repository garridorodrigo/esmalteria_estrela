<?php

session_start();

require_once ('db.class.php');
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT id, nome, sobrenome, email FROM customers
WHERE email = '$email'
AND senha = '$senha'";


$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id) {
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if (isset($dados_usuario['email'])) {

        $_SESSION['id'] = $dados_usuario['id'];
        $_SESSION['nome'] = $dados_usuario['nome'];
        $_SESSION['sobrenome'] = $dados_usuario['sobrenome'];

        header('Location:sistema/listarAgendamentoUser.php');
    } else {
        header('Location:login.php?erro=1');
    }
} else {
    echo "Erro na execução da consulta, favor entrar em contato com o Administrador do Sistema";
}
?>
