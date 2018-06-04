<?php
require_once './lib/conn.php';

session_start();
error_reporting(1);
ini_set('display_errors', 1);

if ($_POST != null) {

    if ($db->connect_error) {
        echo "Erro de conexão: " . $db->connect_error . "<br />";
        exit;
    }


    $sql = "INSERT INTO agendamento(atendente_servico_id, data, turno, horario, id_cliente, status_id) "
            . "VALUES('"
            . $_POST['atendente_servico_id'] . "'"
            . ", '" . $_POST['data'] . "'"
            . ", '" . $_POST['turno'] . "'"
            . ", NULL"
            . ", " . $_SESSION['id']
            . ",    1"
            . ")";

    $retorno = $db->query($sql);

    if ($retorno) {
        echo "<script>
        alert('Cadastrado com sucesso!');
        location.href='listarAgendamentoUser.php';
        </script>";
    } else {
        echo "<script>
        alert('Erro ao cadastrar.');
        </script>";
        echo $db->error;
    }
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
        <title>Cadastrar Agendamento </title>
    </head>
    <body class="">
        <div class="boxCadastrarAdmin ">
            <h1 class="text-center">AGENDAMENTO</h1>
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 formulario">
                        <div class="txtLoginForm text-center" ><img alt="Brand" src="../img/logos/estrelalogoLogin.png"><br> </div>
                        <form method="post">
                            <div class="form-row">
                                <div>
                                    <label for="servico_atendente">Serviço e Atendente</label>
                                    <br />
                                    <?php
                                    $sql = "SELECT ";
                                    $sql .= "     se.id AS servico_id ";
                                    $sql .= "    ,se.nome ";
                                    $sql .= "FROM ";
                                    $sql .= "	 atendentes_servicos ats ";
                                    $sql .= "    INNER JOIN servicos   se ON (ats.servico_id   =  se.id) ";
                                    $sql .= "GROUP BY se.id ORDER BY se.nome ";

                                    $result = $db->query($sql);
                                    ?>
                                    <select class="form-control" name="atendente_servico_id">
                                        <option value="" disabled selected> Selecione...</option>
                                        <?php
                                        while ($row = $result->fetch_array()):
                                            ?>
                                            <optgroup label="<?php echo $row['nome'] ?>">
                                                <?php
                                                $sql = "SELECT ";
                                                $sql .= "    ats.id ";
                                                $sql .= "    ,ats.servico_id ";
                                                $sql .= "    ,ats.atendente_id ";
                                                $sql .= "    ,se.nome AS servico ";
                                                $sql .= "    ,a.nome  AS atendente ";
                                                $sql .= "FROM ";
                                                $sql .= "	atendentes_servicos ats ";
                                                $sql .= "    INNER JOIN atendentes a  ON (ats.atendente_id = a.id) ";
                                                $sql .= "    INNER JOIN servicos   se ON (ats.servico_id   =  se.id) ";
                                                $sql .= "WHERE 1=1 AND  ats.servico_id = " . $row['servico_id'];
                                                $sql .= " ORDER BY se.nome, a.nome ";

                                                $result2 = $db->query($sql);
                                                while ($row2 = $result2->fetch_array()):
                                                    ?>
                                                    <option value="<?php echo $row2['id'] ?>"><?php echo $row2['atendente'] ?></option>
                                                    <?php
                                                endwhile;
                                                ?>
                                            </optgroup>
                                            <?php
                                        endwhile;
                                        ?>
                                    </select>
                                    <div class="col">
                                        <label>Data</label>
                                        <input type="date" class="form-control" id="data" name="data" placeholder="Primeiro Nome" required >        
                                    </div>


                                    <div class="col">
                                        <label>Turno</label>
                                        <select class="form-control" name="turno">

                                            <option value="" disabled selected>Selecione...</option>
                                            <option value="M">Matutino</option>
                                            <option value="V">Vespertino </option>
                                            <option value="MV">Matutino ou Vespertino </option>
                                        </select><br><br>
                                    </div>

                                    <button type="submit" class="btn btn-danger btn-block btnEnviar">Enviar</button>
                                    <a class="btn btn-primary btn-block" href="listarAgendamentoUser.php" role="button">Voltar</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>

</body>

</html>
