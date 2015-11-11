<?php
//include "Utilidades.php";


if(!$_POST)
{
	include "\\..\\Vistas\\form_menu.php";
}
else 
{
	//$Inser=Post('Insertar');
	//CompruebaError_CampoRequerido('Insertar', $Inser, $errores);
	
	
	if($_POST['Insertar'])
	{
		include "\\..\\Controlador\\alta_control.php";
	}
	
}