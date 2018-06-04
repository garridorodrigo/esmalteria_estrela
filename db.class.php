<?php

class db {

    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $database = 'esmalteria_estrela';

    public function conecta_mysql() {

        //cria a conexão 
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
        //ajustar o charset de comunic. entre a api e o bd
        mysqli_set_charset($con, 'utf8');

        //Verificar se houve erro de conexão
        if (mysqli_connect_errno()) {
            echo 'Erro ao tentar se conectar ao Banco de Dados MySql: ' . mysqli_connect_error();
        }
        return $con;
    }

}
