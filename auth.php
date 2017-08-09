<?php 
	session_start();
	if($_SESSION['auth']!=true){
		header("Location: index.php?m=".base64_encode('Primero inicia sesión'));
	}
?>