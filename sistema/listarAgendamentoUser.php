<?php
require_once './lib/conn.php';
session_start();


if (!isset($_SESSION)) {
    unset($_SESSION);
    header('Location: ../login.php');
}

if ($db->connect_error == true) {
    echo "Erro de conexão:" . $db->connect_error . "<br />";
    exit;
}
?>

<!DOCTYPE html>
<html>

    <head>
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                /**
                 * 
                 * @param {type} obj
                 * @returns {undefined}
                 */
                $.alteraStatus = function (obj, id) {
                    location.href = 'status.php?status_id=' + $(obj).val() + '&id=' + id;
                };
                $.alteraHorario = function (obj, id) {
                    location.href = 'horario.php?horario=' + $(obj).val() + '&id=' + id;
                };
            });
        </script>
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
            <a class="btn btn-primary" href="cadastrarAgendamentoUser.php" role="button">Solicitar Agendamento</a>
            
            <a class="btn btn-danger" href="../sair.php" role="button">Sair</a>
           <!-- Bem vindo (a),  <?= $_SESSION['nome'] ?> <?= $_SESSION['sobrenome'] ?>! --> 
            <br>
            <hr>

            <table class="table table-striped">
                <tr>
                    <th width="5%">Id</th>
                    <th width="20%">Cliente</th>
                    <th width="20%">Serviço</th>
                    <th width="20%">Atendente</th>
                    <th width="20%">Data</th>
                    <th width="20%">Turno</th>
                    <th width="10%">Horário</th>
                    <th width="10%">Status</th>
                </tr>
                <?php
                $sql = "SELECT ";
                $sql .= "    ag.id ";
                $sql .= "    ,ag.id_cliente ";
                $sql .= "    ,DATE_FORMAT(ag.data, '%d-%m-%Y') AS data";
                $sql .= "    ,ag.turno ";
                $sql .= "    ,ag.horario ";
                $sql .= "    ,ag.status_id ";
                $sql .= "    ,c.nome AS cliente ";
                $sql .= "    ,ats.id AS atendente_servico_id ";
                $sql .= "    ,ats.servico_id ";
                $sql .= "    ,ats.atendente_id ";
                $sql .= "    ,se.nome AS servico ";
                $sql .= "    ,a.nome  AS atendente ";
                $sql .= "FROM  ";
                $sql .= "    agendamento ag ";
                $sql .= "    INNER JOIN customers c ON  (ag.id_cliente = c.id) ";
                $sql .= "    INNER JOIN atendentes_servicos ats ON (ag.atendente_servico_id = ats.id) ";
                $sql .= "    INNER JOIN atendentes a  ON (ats.atendente_id = a.id) ";
                $sql .= "    INNER JOIN servicos   se ON (ats.servico_id   =  se.id) ";
                $sql .= "WHERE 1=1 ";

                if (!isset($_SESSION['administrator']) && isset($_SESSION['id'])):
                    $sql .= " AND ag.id_cliente = " . $_SESSION['id'];
                endif;

                $sql .= " ORDER BY ag.data, ag.horario ";

                $retorno = $db->query($sql);

                if (!$retorno) :
                    echo $db->error;
                    exit;
                endif;

                $turno = [
                    'M' => 'Matutino',
                    'V' => 'Vespertino',
                    'MV' => 'Matutino e Vespertino',
                ];
                while ($registro = $retorno->fetch_array()):
                    ?>
                    <tr class="<?php echo ($registro['status_id'] == 3 ? 'alert-danger' : null) ?>">
                        <td><?php echo $registro['id'] ?></td>
                        <td><?php echo $registro['cliente'] ?></td>
                        <td><?php echo $registro['servico'] ?></td>
                        <td><?php echo $registro['atendente'] ?></td>
                        <td><?php echo $registro['data'] ?></td>
                        <td><?php echo $turno[$registro['turno']] ?></td>
                        <td>
                            <input type="time" class="form-control" id="horario" name="horario" value="<?php echo $registro['horario'] ?>" 
                                <?php echo (!isset($_SESSION['administrator']) ? 'disabled' : null) ?> onblur="$.alteraHorario(this, <?php echo $registro['id'] ?>);"> 
                        </td>
                        <td>
                            <?php
                            $sql = "SELECT id, nome FROM status ORDER BY nome";
                            $rs = $db->query($sql);
                            ?>
                            <select name="status_id" <?php echo (!isset($_SESSION['administrator']) ? 'disabled' : null) ?> onchange="$.alteraStatus(this, <?php echo $registro['id'] ?>);">
                                <?php
                                while ($row = $rs->fetch_array()):
                                    if ($registro['status_id'] == $row['id']):
                                        echo '<option value="' . $row['id'] . '" selected>' . $row['nome'] . '</option>';
                                    else:
                                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                                    endif;
                                endwhile;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <?php
                endwhile;
                ?>
            </table>
        </div>
    </body>

</html>
