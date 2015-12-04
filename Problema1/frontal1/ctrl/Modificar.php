<?php
$HayError=false;
$errores=[];
include_once "\\..\\Instalador\\BD.php";
include_once "\\..\\Model\\logica.php";
include_once "\\Utilidades.php";
include_once"\\Helpers\\form.php";
$provincias=[];
$provincias=obtenerProvincias();
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
if(!$_POST)
{
	
	$tarea=BuscarRegistro($_GET['id']);
	print_r($tarea);
	$provincia=$tarea['provincia'];
	echo $provincia;
	include "\\View\\form_modificar.php";
	
}
else
{	$id=$_GET['id'];
	$tarea=BuscarRegistro($_GET['id']);
	$provincia=$tarea['provincia'];
	$patronTLF= '/^[9|6|7][0-9]{8}$/';
	$patronCP='/[0-9]{5}/';
	
	
	
	//Comprobamos que los campos cumplan su formato y no esten vacios.

	if($_POST['Descr']=="")
	{
		
		$HayError=true;
		$errores['Descr']= "Error en el campo descripcion.";
	}
	if($_POST['nombre']=="")
	{
		$HayError=true;
		$errores['nombre']= "Error en el campo Contacto.";
	}
	if(!isset($_POST['fecha_f']) || validar_fecha($_POST['fecha_f']))
	{
		$HayError=true;
		$errores['fecha_f']= "Error en el campo Fecha Fin. Formato fecha dd/mm/yyyy";
	
	}

	if($_POST['provincia']=="")
	{
		$HayError=true;
		$errores['provincia']= "Error en el campo Provincia.";
	}
	
	if(!isset($_POST['ESTADO']))
	{
		$HayError=true;
		$errores['ESTADO']= "Error en el campo Estado.";
	}

	if($_POST['correo']=="")
	{
		$HayError=true;
		$errores['correo']= "Error en el campo Correo.";
	}
	
	
	if($_POST['direccion']=="")
	{
		$HayError=true;
		$errores['direccion']= "Error en el campo Direccion.";
	}

	
	if($_POST['ope']=="")
	{
		$HayError=true;
		$errores['ope']= "Error en el campo Operario.";
	}
	//Campo opcional.
	if(!isset($_POST['anoF']))
	{
		$HayError=true;
		$errores['anoA']= "Error en el campo Anotacion final.";
	}
	if(!isset($_POST['tlf']) || !preg_match($patronTLF, $_POST['tlf']))
	{
		$HayError=true;
		$errores['tlf']= "Error en el campo telefono.";
	}
	if(!isset($_POST['CP']) || !preg_match($patronCP, $_POST['CP']))
	{
		
		$HayError=true;
		$errores['CP']= "Error en el campo Codigo postal.";
	}
	
	$fecha= TransformarFecha($_POST['fecha_f']);
	//creamos un array con los campos recogidos y filtrados para su inserccion.
	$campos=CreaArrayTareas($_POST['Descr'],$_POST['nombre'],$_POST['tlf'],$fecha, $_POST['correo'],
			$_POST['ESTADO'], $_POST['Pobla'], $_POST['CP'],$_POST['direccion'],$_POST['provincia'],'',
			$_POST['anoF'],$_POST['ope']);
	
	
	if($HayError)
	{
		include_once "\\..\\View\\form_modificar.php";
	}
	else
	{
		
		ModificarTarea($campos,$id);
		include "\\..\\ctrl\\Listar.php";
	
	}
}