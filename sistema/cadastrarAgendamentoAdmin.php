<?php
error_reporting(1);

if($_POST != null){
    $db = new mysqli("localhost","root","","esmalteria_estrela");

    if($db->connect_error){
        echo "Erro de conexão: " . $db->connect_error . "<br />";
        exit;
    }


    $servico =          $_POST["servico"];
    $atendente =        $_POST["atendente"];
    $data =             $_POST["data"];
    $turno =            $_POST["turno"];
    $horario =          $_POST["horario"];
    $status =          $_POST["status"];

    $sql = "INSERT INTO ordem_servico(servico, atendente, data, turno, horario, status)
    VALUES('$servico', '$atendente', '$data', '$turno', '$horario', '$status')";

    $retorno = $db->query($sql);

    if($retorno){
        echo "<script>
        alert('Cadastrado com sucesso!');
        location.href='listar_os.php';
        </script>";
    }
    else {
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

<body>
    <div class="boxCadastrarAdmin ">
        <h1 class="text-center">Agendamento</h1>


        <div class="container">
    <div class="row ">



      <div class="col-md-4 formulario">
        <div class="txtLoginForm text-center" ><img alt="Brand" src="../img/logos/estrelalogoLogin.png"><br> </div>

        <form method="post" >
          <div class="form-row">
            <div class="col">
              <label>Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Primeiro Nome" required >        

            </div>

              <div class="col">
                <label>Sobrenome</label>
                <input type="text" class="form-control"  id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col">
                <label>Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(xx) xxxx-xxxx" >
              </div>


              <div class="col">
                <label>Data de Nascimento</label>
                <input type="date" class="form-control"  id="nascimento" name="nascimento" placeholder="Digite sua senha">
              </div>
            </div>

            <div class="form-row">
              <div class="col">
                <label>Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha" >
              </div>

          <!--  

            <hr>
            <form  method="post">
                <div class="form-group">
                    <div>
                    <label for="servico">servico</label>
                    <br />
                    <input type="text" name="cliente" required>
                </div>

                <br />

                <div>
                    <label for="atendente">atendente</label>
                    <br />
                    <input type="text" name="atendente" required>
                </div>

                <br />

                <div>
                    <label for="status">Status</label>
                    <br />
                    <select name="status">
                        <option value="aberto">Em aberto</option>
                        <option value="manutencao">Em manutenção</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>

                <br />

                <div>
                    <label for="data_cadastro">Data</label>
                    <br />
                    <input type="date" name="data_cadastro">
                </div>

                <br />

                <div>
                    <label for="problema">Problema</label>
                    <br />
                    <textarea name="problema" required></textarea>
                </div>

                <br />

                <div>
                    <label for="solucao">Solução</label>
                    <br />
                    <textarea name="solucao"></textarea>
                </div>

                <br />
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-primary" href="listar_os.php" role="button">Voltar</a>
                </div>
            </form>
        -->
    </div>
                        <div class="col-md-4"></div>

</body>

</html>