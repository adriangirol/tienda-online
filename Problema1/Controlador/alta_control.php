<?php

include_once "\\..\\Modelo\\logica.php";

 $provincias=[];
 $provincias=obtenerProvincias();
 
$HayError=false;
$errores=[];
include_once "..\\Controlador\\Utilidades.php";
if(!$_POST)
{
	include "\\..\\Vistas\\form_insert.php";
}
else 
{
	include_once '\\..\\Controlador\\Help_alta_control.php';
	$patronTLF= '/^[9|6|7][0-9]{8}$/';
	$patronCP='/[0-9]{5}/';
	
	if(!isset($_POST['Descr']))
	{
		$HayError=true;
		$errores['Descr']= "Error en el campo descripcion.";;
	}
	
	if(!isset($_POST['nombre']))
	{
		$HayError=true;
		$errores['nombre']= "Error en el campo Nombre.";
	}
	if(!isset($_POST['fecha_f']) || validar_fecha($_POST['fecha_f']))
	{
		$HayError=true;
		$errores['fecha_f']= "Error en el campo Fecha Fin. Formato fecha dd/mm/yyyy";
		
	}
	if(!isset($_POST['provincia']))
	{
		$HayError=true;
		$errores['provincia']= "Error en el campo Provincia.";
	}
	
	if(!isset($_POST['ESTADO']))
	{
		$HayError=true;
		$errores['ESTADO']= "Error en el campo Estado.";
	}
	if(!isset($_POST['correo']))
	{
		$HayError=true;
		$errores['correo']= "Error en el campo Correo.";
	}	
	if(!isset($_POST['direccion']))
	{
		$HayError=true;
		$errores['direccion']= "Error en el campo Direccion.";
	}
	if(!isset($_POST['ope']))
	{
		$HayError=true;
		$errores['ope']= "Error en el campo Operario.";
	}
	if(!isset($_POST['anoA']))
	{
		$HayError=true;
		$errores['anoA']= "Error en el campo Anotacion antes de empezar.";
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
							$_POST['ESTADO'], $_POST['Pobla'], $_POST['CP'],$_POST['direccion'],$_POST['provincia'],
							$_POST['anoA'],$_POST['ope']);
	
	//conectamos con la base de datos y Insertamos el registro.
	include_once "\\..\\Instalador\\BD.php";
	
	if($HayError)
	{
		include_once "\\..\\Vistas\\form_insert.php";
	}
	else 
	{
		$bd=Database::getInstance();
		$bd->Insertar("tarea", $campos);
		include "\\..\\Vistas\\form_insert.php";
		
	}
	
	
	

	
}
