<?php
$HayError=false;
$errores=[];
include_once "\\..\\Model\\login.php";

if(!$_POST)
{
	include_once '\\view\\inicio.php';
}
else
{
	
	if (! loginOk($_POST['USUARIO'],$_POST['PASS']) )
	{
		$HayError=true;
		$errores['usuario']="El usuario no es correcto.";
		include_once '\\view\\inicio.php';
	}
	else 
	{
		include_once '\\ctrl\\Usuariodentro.php';
	}
}