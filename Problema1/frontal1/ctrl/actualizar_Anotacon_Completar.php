<?php
include_once"\\..\\Model\\Logica.php";

if(isset($_POST['anoD'])){
	$anotacion=$_POST['anoD'];
	
	ModificarAnotacion($anotacion, $id);
	CompletarTarea($id);
	include_once "\\ctrl\\listar.php";
}else 
	include_once(VIEW_PATH."anotacionFinal.php");