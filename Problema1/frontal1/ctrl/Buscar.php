<?php
$HayError=false;
$errores=[];
include_once "\\..\\Instalador\\BD.php";
include_once "\\..\\Model\\logica.php";
include_once "\\Utilidades.php";
include_once"\\Helpers\\form.php";
include_once"\\model\\login.php";

if( ! Estadentro()){

	$HayError=true;
	$errores['autenticacion']="Registrese correctamente.";
	include '\\ctrl\inicio.php';
	exit;
}


if(!$_POST)
{
	
	include_once(VIEW_PATH.'form_buscar.php');
}
else 
{
	
	
	if(isset($_POST['pendiente']))
	{
		$condicion="estado='Pendiente'";
		include(CTRL_PATH.'listarFiltro.php');
	}
	if(isset($_POST['Buscarfecha'])){
		
		
		$fecha=$_POST['fecha_b'];
		$fecha=TransformarFecha($fecha);
		$condicion="f_fin= '$fecha'";
		include(CTRL_PATH.'listarFiltro.php');
		
	}
	if(isset($_POST['Buscarid']))
	{
		$id=$_POST['id'];
		$ListaTareas=BuscarTareas("idtarea='$id'", 0, 1);
		if(Nregistrosfiltrados("idtarea='$id'")>0)
			include(VIEW_PATH.'listarFiltroid.php');
		else {
		
		echo "<h3 align='center'> No existen tareas</h3>";
		}
			
		
	}
}