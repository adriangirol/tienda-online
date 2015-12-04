<?php
include_once"\\Model\\Logica.php";
if( ! Estadentro()){

	$HayError=true;
	$errores['autenticacion']="El usuario no es correcto";
	include '\\ctrl\inicio.php';
	exit;
}
if (TipoUsuario() != "administrador"){
	include '\\ctrl\\sinacceso.php';
	exit;
}
BorrarTarea($_GET['id']);
include_once"\\ctrl\\listar.php";