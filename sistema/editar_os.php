<?php
error_reporting(1);

$db = new mysqli("localhost","root","","esmalteria_estrela");

if($db->connect_error){
    echo "Erro de conexão: " . $db->connect_error . "<br />";
    exit;
}

$id = $_GET["id"];

if($id != null){
    $sql = "SELECT * FROM agendamento WHERE id = '$id'";

    $retorno = $db->query($sql);

    if (!$retorno){
        echo $db->error;
        exit;
    }

    if($registro = $retorno->fetch_array()){

        $servico_atendente =    $registro["servico_atendente"];
        $data =          $registro["data"];
        $turno =       $registro["turno"];
        $horario =           $registro["horario"];
        $status =    $registro["status"];

    }
}
else {
    echo "<script>
    location.href='listarAgendamentoAdmin.php';
    </script>";
}

if($_POST != null){
    $servico_atendente =    $registro["servico_atendente"];
    $data =          $registro["data"];
    $turno =       $registro["turno"];
    $horario =           $registro["horario"];
    $status =    $registro["status"];

    $sql = "UPDATE agendamento
    SET servico_atendente = '$servico_atendente', data = '$data', turno = '$turno',
    horario = '$horario', status = '$status'
    WHERE id = $id";

    $retorno = $db->query($sql);

    if($retorno){
        echo "<script>
        alert('Alterado com sucesso!');
    location.href='listarAgendamentoAdmin.php';
        </script>";
    }
    else {
        echo "<script>
        alert('Erro ao alterar.');
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
    <meta charset="UTF-8">
    <title>Editar Ordem de Serviço</title>
    <link href="../css/sistema.css" rel="stylesheet">

    <style>
    @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Condensed');

    body {
  background:url("../img/header-bgestrelafocus.jpg")no-repeat;
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
        <h1>Editar Agendamento</h1>
        <a href="listarAgendamentoAdmin.php">Voltar</a>
        <hr>
        <form method="post">
             <div class="form-row">
                      <div>
                        <label for="servico_atendente">Serviço e Atendente</label>
                        <br />
                        <select class="form-control" name="servico_atendente">
                           <optgroup label="Pé">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="Pé - Mariana Lacerda">Mariana Lacerda</option>
                            <option value="Pé - Yasmin Brasil">Yasmin Brasil </option>
                            <option value="Pé - Kátia Dourado">Kátia Dourado</option>
                            <option value="Pé - Paula Ribeiro ">Paula Ribeiro</option>
                        </optgroup>

                        <optgroup label="Mão">
                            <option value="Mão - Yasmin Brasil">Yasmin Brasil </option>
                            <option value="Mão - Kátia Dourado">Kátia Dourado</option>
                            <option value="Mão - Paula Ribeiro ">Paula Ribeiro</option>
                        </optgroup>

                        <optgroup label="Pé e mão">
                            <option value="Pé e mão - Mariana Lacerda">Mariana Lacerda</option>
                            <option value="Pé e mão - Yasmin Brasil">Yasmin Brasil </option>
                            <option value="Pé e mão - Kátia Dourado">Kátia Dourado</option>
                            <option value="Pé e mão - Paula Ribeiro">Paula Ribeiro</option>
                        </optgroup>

                        <optgroup label="Spa dos Pés">
                            <option value="Spa dos Pés - Mariana Lacerda">Mariana Lacerda</option>
                            <option value="Spa dos Pés - Yasmin Brasil ">Yasmin Brasil </option>
                        </optgroup>

                        <optgroup label="Depilação com cera">
                            <option value="Depilação com cera - Mariana Lacerda">Mariana Lacerda</option>
                            <option value="Depilação com cera - Yasmin Brasil ">Yasmin Brasil </option>
                            <option value="Depilação com cera - Kátia Dourado">Kátia Dourado</option>
                        </optgroup>

                        <optgroup label="Depilação com Linha">
                            <option value="Depilação com Linha - Paula Ribeiro">Paula Ribeiro</option>
                        </optgroup>

                        <optgroup label="Podologia">
                            <option value="Podologia - Mariana Lacerda">Mariana Lacerda</option>
                            <option value="Podologia - Yasmin Brasil">Yasmin Brasil </option>
                        </optgroup>

                        <optgroup label="Massagens">
                            <option value="Massagens - Felipe Macedo">Felipe Macedo</option>
                        </optgroup>

                        <optgroup label="Alongamento de Unhas">
                            <option value="Alongamento de Unhas - Ingrid Moreira">Ingrid Moreira</option>
                            <option value="Alongamento de Unhas - Mariana Rodrigues">Mariana Rodrigues </option>
                        </optgroup>

                    </select>

                    <div class="col">
                      <label>Data</label>
                      <input type="date" class="form-control" id="data" name="data" placeholder="Primeiro Nome" required >        
                  </div>


                  <div class="col">
                      <label>Turno</label>
                      <select class="form-control" name="turno">

                        <option value="" disabled selected>Selecione...</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino </option>
                        <option value="Matutino ou Vespertino">Matutino ou Vespertino </option>
                    </select><br><br>
                </div>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>