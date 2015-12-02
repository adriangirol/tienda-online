<?php

include_once "\\..\\Model\\logica.php";

if(!$_POST)
{
	include_once '\\view\\inicio.php';
}
else
{
	
	if(ComprobarUsuario($_POST['USUARIO'],$_POST['PASS'])==TRUE)
	{
		$usuario=true;
		include_once '\\view\\inicio.php';
		echo "<p> USUARIO CORRECTO </p>";
		
	}
	else {
		$usuario=false;
		include_once '\\view\\inicio.php';
		echo "<p> USUARIO INCORRECTO </p>";
	}
}