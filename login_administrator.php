<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="img/logos/favicon.ico">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <link href="css/style.css" rel="stylesheet">
        <script>

            //verificar se os campos de usuário e senha foram devidamente preenchidos
            $(document).ready(function () {

                $('#btn_login').click(function () {

                    var campo_vazio = false;

                    if ($('#email').val() == '') {
                        $('#email').css({'border-color': '#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#email').css({'border-color': '#CCC'});
                    }

                    if ($('#senha').val() == '') {
                        $('#senha').css({'border-color': '#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#senha').css({'border-color': '#CCC'});
                    }

                    if (campo_vazio)
                        return false;

                });

            });

        </script>

        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row ">

                <div class="col-md-4"></div>


                <div class="col-md-4 formulario">
                    <div class="txtLoginForm"><img alt="Brand" src="img/logos/estrelalogoLogin.png"><br> </div>

                    <form class="form" method="post" action="validar_acesso_administrator.php" accept-charset="UTF-8" id="formLogin">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" >
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btnEntrar" id="btn_login">Entrar</button>
                            <a class="btn btn-secondary btn-block btnFechar" role="button" value="Voltar"  href="index.html" id="btnfechar" type="button">Voltar</a>

                        </div>
                        <div class="checkbox">

                        </div>
                        <div class="bottom text-right">
                            Novo(a) aqui? <a href="cadastrar_admin.html" class="linkCadastrar"><b>Cadastre-se</b></a>
                        </div>
                    </form>

                    <?php
                    if ($erro == 1) {

                        echo "Usuário ou senha incorretos";
                    }
                    ?>
                    <div><label></label></div>
                </div>

            </div>
        </div>




        <div class="col-md-4"></div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>
