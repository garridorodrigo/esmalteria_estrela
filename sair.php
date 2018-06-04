<?php  

session_start();
unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['sobrenome']);

session_destroy();


 echo "<script>
                    alert('Volte Sempre, Esmalteria Estrela Agradece a sua preferência!');
                    location.href='./index.html';
                </script>";

?>
