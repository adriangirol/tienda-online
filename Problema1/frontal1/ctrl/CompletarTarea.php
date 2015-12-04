<?php
include_once"\\..\\Model\\Logica.php";

if( ! Estadentro()){

	$HayError=true;
	$errores['autenticacion']="El usuario no es correcto";
	include '\\ctrl\inicio.php';
	exit;
}

$id=$_GET['id'];
include_once(CTRL_PATH."actualizar_anotacon_Completar.php");
