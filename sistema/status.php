<?php

session_start();
error_reporting(1);

require_once './lib/conn.php';

if ($db->connect_error) {
    echo "Erro de conexão: " . $db->connect_error . "<br />";
    exit;
}

$sql = "UPDATE agendamento SET status_id = " . $_GET['status_id'] . " WHERE id = " . $_GET['id'];

if ($db->query($sql)) {
    header('location:listarAgendamentoUser.php');
} else {
    echo $db->error;
}
?>