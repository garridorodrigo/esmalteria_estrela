<?php
error_reporting(1);
$db = new mysqli("localhost","root","","andrecos_unifacs");

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
        <h1>Agendamentos</h1>
        <a href="cadastrarAgendamentoUser.php">Cadastrar</a>
        <hr>

        <table class="table table-striped">
            <tr>
                <th width="10%">Id</th>
                <th width="40%">Cliente</th>
                <th width="20%">Status</th>
                <th width="10%">Ver</th>
                <th width="10%">Editar</th>
                <th width="10%">Apagar</th>
            </tr>
            <?php
            $sql = "SELECT * FROM ordem_servico";

            $retorno = $db->query($sql);

            if(!$retorno){
                echo $db->error;
                exit;
            }
            while($registro = $retorno->fetch_array()){
                $id =       $registro["id"];
                $cliente =  $registro["cliente"];
                $status =   $registro["status"];

                if($status == "finalizado"){
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
                
                echo "<tr>
                <td>$id</td>
                <td>$cliente</td>
                <td style='color: $corStatus'>$status</td>
                <td><a href='ver_os.php?id=$id'>Ver</a></td>
                <td><a href='editar_os.php?id=$id'>Editar</a></td>
                <td><a href='apagar_os.php?id=$id'>Apagar</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>