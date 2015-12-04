<?php
$HayError=false;
$errores=[];
include_once "\\..\\Instalador\\BD.php";
include_once "\\..\\Model\\logica.php";
include_once "\\Utilidades.php";
include_once"\\Helpers\\form.php";
include_once"\\model\\login.php";
$provincias=[];
$provincias=obtenerProvincias();

if( ! Estadentro()){

	$HayError=true;
	$errores['autenticacion']="Registrese correctamente.";
	include '\\ctrl\inicio.php';
	exit;
}
if (TipoUsuario() != "administrador"){
	include '\\ctrl\\sinacceso.php';
	exit;
}
// Esta dentro


        if(!$_POST)
        {
            include "\\View\\form_insert.php";
        }
        else 
        {


            $patronTLF= '/^[9|6|7][0-9]{8}$/';
            $patronCP='/[0-9]{5}/';
            
            //Comprobamos que los campos cumplan su formato y no esten vacios.
            $descripcion=$_POST['Descr'];
            if($descripcion=="")
            {
                    $HayError=true;
                    $errores['Descr']= "Error en el campo descripcion.";
            }

            $nombre=$_POST['nombre'];

            if($nombre=="")
            {
                    $HayError=true;
                    $errores['nombre']= "Error en el campo Nombre.";
            }
            if(!isset($_POST['fecha_f']) || validar_fecha($_POST['fecha_f']))
            {
                    $HayError=true;
                    $errores['fecha_f']= "Error en el campo Fecha Fin. Formato fecha dd/mm/yyyy";

            }
            $pro=$_POST['provincia'];

            if($pro=="")
            {
                    $HayError=true;
                    $errores['provincia']= "Error en el campo Provincia.";
            }

            if(!isset($_POST['ESTADO']))
            {
                    $HayError=true;
                    $errores['ESTADO']= "Error en el campo Estado.";
            }
            $correo=$_POST['correo'];

            if($correo=="")
            {
                    $HayError=true;
                    $errores['correo']= "Error en el campo Correo.";
            }
            $dir=$_POST['direccion'];

            if($dir=="")
            {
                    $HayError=true;
                    $errores['direccion']= "Error en el campo Direccion.";
            }
            $o=$_POST['ope'];
			
            if($o=="")
            {
                    $HayError=true;
                    $errores['ope']= "Error en el campo Operario.";
            }
            //Campo opcional.
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
                                                            $_POST['anoA'],"",$_POST['ope']);

            //conectamos con la base de datos y Insertamos el registro.

            if($HayError)
            {
                    include_once "\\..\\View\\form_insert.php";
            }
            else 
            {
                    InsertaTarea($campos);
                    include VIEW_PATH."insertado.php";

            }

        }


