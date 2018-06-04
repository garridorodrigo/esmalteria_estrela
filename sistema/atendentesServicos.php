<?php
require_once './lib/conn.php';
session_start();
error_reporting(1);

if ($_POST != null) {

    if ($db->connect_error) :
        echo "Erro de conexão: " . $db->connect_error . "<br />";
        exit;
    endif;


    try {
        foreach ($_POST['servico_id'] as $key => $servico_id) :

            $sql = "INSERT INTO atendentes_servicos";
            $sql .= "( ";
            $sql .= "	atendente_id ";
            $sql .= "	,servico_id ";
            $sql .= ") ";
            $sql .= "VALUES ";
            $sql .= "( ";
            $sql .= $_POST['atendente_id'];
            $sql .= "	," . $servico_id;
            $sql .= ") ";

            if (!$db->query($sql)):
                throw new Exception();
            endif;
        endforeach;

        echo "<script>
                alert('Cadastrado com sucesso!');
                location.href='./atendentesServicos.php';
            </script>";
    } catch (Exception $e) {

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
                        <form method="post" >
                            <div class="form-row">
                                <div>
                                    <label for="atendente">Atendente</label>
                                    <br />
                                    <?php
                                    $sql = "SELECT ";
                                    $sql .= "     a.id";
                                    $sql .= "    ,a.nome ";
                                    $sql .= "FROM ";
                                    $sql .= "    atendentes a ";
                                    $sql .= "ORDER BY a.nome ";

                                    $result = $db->query($sql);
                                    ?>                                   
                                    <select class="form-control" name="atendente_id">
                                        <option value="" disabled selected>Selecione...</option>
                                        <?php
                                        while ($row = $result->fetch_array()):
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nome'] ?></option>
                                            <?php
                                        endwhile;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="servico">Serviços</label>
                                    <?php
                                    $sql = "SELECT ";
                                    $sql .= "     se.id";
                                    $sql .= "    ,se.nome ";
                                    $sql .= "FROM ";
                                    $sql .= "    servicos se ";
                                    $sql .= "ORDER BY se.nome ";

                                    $result = $db->query($sql);

                                    while ($row = $result->fetch_array()):
                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="servico_id[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">
                                                <?php echo $row['nome'] ?>
                                            </label>
                                        </div>
                                        <?php
                                    endwhile;
                                    ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-block btnEnviar">Enviar</button>
                            <a class="btn btn-primary btn-block" href="listarAgendamentoUser.php" role="button">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</body>
</html>
