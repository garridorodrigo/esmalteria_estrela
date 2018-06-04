<?php

session_start();
require_once 'db.class.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "INSERT INTO customers(nome, sobrenome, telefone, nascimento, senha, email, cep, rua, bairro,cidade,uf) "
        . "values ('$nome'"
        . ", '$sobrenome'"
        . ", '$telefone'"
        . ", '$nascimento'"
        . ", '$senha'"
        . ", '$email'"
        . ", '$cep'"
        . ", '$rua'"
        . ", '$bairro'"
        . ", '$cidade'"
        . ", '$uf' )";

if (mysqli_query($link, $sql)) {
    header('location:login.php');
} else {
    echo "Erro ao registrar o usuário!";
}
?>

