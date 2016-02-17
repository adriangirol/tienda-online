<?php
if( ! Estadentro()){

	$HayError=true;
	$errores['autenticacion']="Usuario no Registrado.";
	include '\\ctrl\inicio.php';
	exit;
}else{

	include '\\ctrl\\cierre.php';
	
	session_destroy();
}


