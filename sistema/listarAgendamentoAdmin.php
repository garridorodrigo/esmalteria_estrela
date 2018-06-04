<?php
session_start();

if ($_SESSION['logado'] =! 'ok') {
    header('Location: index.html');
}

error_reporting(1);
$db = new mysqli("localhost","root","","esmalteria_estrela");

if($db->connect_error == true){
    echo "Erro de conexão:" . $db->connect_error . "<br />";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="image/x-icon" href="../img/logos/favicon.ico">
    <link href="../css/sistema.css" rel="stylesheet">


    <meta charset="UTF-8">
    <title>Meus Agendamentos</title>
</head>

<body>
    <div class="boxAgendar">
        <h1>Meus Agendamentos</h1>
        <a class="btn btn-primary" href="cadastrarAgendamentoUser.php" role="button">Agendar</a>
       <!-- <a class="btn btn-danger" href='ver_os.php?id=$id'>Ver</a>-->
        <a class="btn btn-warning" href='editar_os.php?id=$id'>Editar</a>
        <a class="btn btn-danger" href='apagar_os.php?id=$id'>Apagar</a>
        <a class="btn btn-success" href="../sair.php" role="button">Sair</a>


        Bem vindo (a),  <?= $_SESSION['nome']?> <?= $_SESSION['sobrenome']?>! 

        

        <br>

        <hr>

        <table class="table table-striped">
            <tr>
                <th width="5%">Id</th>
                <th width="20%">Serviço e Atendente</th>
                <th width="20%">Data</th>
                <th width="20%">Turno</th>
                <th width="10%">Horario</th>
                <th width="10%">Status</th>

<!--                <th width="10%">Editar</th>
                <th width="10%">Apagar</th>
    
            -->
        </tr>
        <?php
        $sql = "SELECT * FROM agendamento";

        $retorno = $db->query($sql);

        if(!$retorno){
            echo $db->error;
            exit;
        }
        while($registro = $retorno->fetch_array()){
            $id =       $registro["id"];
            $servico_atendente =  $registro["servico_atendente"];
            $data =   $registro["data"];
            $turno =   $registro["turno"];
            $horario =   $registro["horario"];
            $status =   $registro["status"];



                /*if($status == "finalizado"){
                    $status = "Finalizado";
                    $corStatus = "green";
                }
                else if($status == "manutencao"){
                    $status = "Em Manutenção";
                    $corStatus = "orange";
                }
                else{
                    $status = "Em Aberto";
                    $corStatus = "red";
                 } 

                 <td><a href='ver_os.php?id=$id'>Ver</a></td>
                <td><a href='editar_os.php?id=$id'>Editar</a></td>
                <td><a href='apagar_os.php?id=$id'>Apagar</a></td>
                <td style='color: $corStatus'>$status</td>

                Código Td Abaixo do StyleColor
                */
                
                echo "<tr>
                <td>$id</td>
                <td>$servico_atendente</td>
                <td>$data</td>
                <td>$turno</td>
                <td>$horario</td>
                <td>$status</td>


                
                
                </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>