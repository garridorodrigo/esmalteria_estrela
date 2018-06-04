<?php
    error_reporting(1);

    $db = new mysqli("localhost","root","","andrecos_unifacs");
    
    if($db->connect_error){
        echo "Erro de conexão: " . $db->connect_error . "<br />";
        exit;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ver Ordem de Serviço</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Condensed');

        body {
            background: #0094ff;
            color: #373737;
            font-family: 'Encode Sans Condensed', sans-serif;
        }

        .box {
            width: 700px;
            background: #F9F9F9;
            padding: 25px;
            padding-left: 100px;
            padding-right: 100px;
            margin: 100px 0 auto;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
    </style>
</head>

<body>
    <div class="box">
        <h1>Ver Ordem de Serviço</h1>
        <a href="listar_os.php">Voltar</a>
        <hr>

        <table>
            <?php
                $id = $_GET["id"];

                if($id != null){
                    $sql = "SELECT * FROM ordem_servico WHERE id = '$id'";
                    
                    $retorno = $db->query($sql);
            
                    if (!$retorno){
                        echo $db->error;
                        exit;
                    }
                    if($registro = $retorno->fetch_array()){
        
                        $cliente =          $registro["cliente"];
                        $smartphone =       $registro["smartphone"];
                        $status =           $registro["status"];
                        $data_cadastro =    $registro["data_cadastro"];
                        $problema =         $registro["problema"];
                        $solucao =          $registro["solucao"];
        
                        echo "<tr>
                                <td><b>Cliente: </b></td>
                                <td>$cliente</td>
                            </tr>
                            <tr>
                                <td><b>Smartphone: </b></td>
                                <td>$smartphone</td>
                            </tr>
                            <tr>
                                <td><b>Status: </b></td>
                                <td>$status</td>
                            </tr>
                            <tr>
                                <td><b>Data do Cadastro: </b></td>
                                <td>$data_cadastro</td>
                            </tr>
                            <tr>
                                <td><b>Problema: </b></td>
                                <td>$problema</td>
                            </tr>
                            <tr>
                                <td><b>Solução: </b></td>
                                <td>$solucao</td>
                            </tr>";
                    }
                }
                else {
                    echo "<script>
                            alert('Id inválido');
                            location.href='listar_os.php';
                        </script>";
                }
            ?>
        </table>
    </div>
</body>

</html>