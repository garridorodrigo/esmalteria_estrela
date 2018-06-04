<?php  
	$con = new mysqli("localhost", "root", "", "esmalteria_estrela");

	if ($con->connect_errno == true) {
		echo "Erro ao conectar";
	}



?>