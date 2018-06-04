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
        <meta charset="UTF-8">
        <title>Listar Ordem de Serviço</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Condensed');

            body {
                background: #0094ff;
                color: #373737;
                font-family: 'Encode Sans Condensed', sans-serif;
            }

            th {
                text-align: left;
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
            <h1>Listar Ordem de Serviço</h1>
            <a href="cadastrar_os.php">Cadastrar</a>
            <hr>

            <table width="100%">
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