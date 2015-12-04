<?php
$HayError=false;
$errores=[];
define ('PROXPAG', 2);
/* Muesta la lista de tareas */
if( ! Estadentro()){

	$HayError=true;
	$errores['autenticacion']="El usuario no es correcto";
	include '\\ctrl\inicio.php';
	exit;
}
include(MODEL_PATH.'tareas.php');
include_once "\\..\\Model\\Logica.php";

if ($_POST)
{
	$_SESSION['condBusqueda']=$condicion;
} else {
	$condicion=$_SESSION['condBusqueda'];
}


if (isset($_GET['pag']))
	$pag=$_GET['pag'];
else
	$pag=1;
$maxPag=((int) (Nregistrosfiltrados($condicion)-1)/PROXPAG)+1;

if ($pag<1 || $pag>$maxPag)
	$pag=1;

$posIni=(($pag-1)*PROXPAG)+1;

if((Nregistrosfiltrados($condicion))>0){
	$FiltroTareas=BuscarTareas($condicion, $posIni, PROXPAG);
	
	// En un controlador real esto haría más cosas
	include(VIEW_PATH.'listar_Filtro_Fecha_y_Pendientes.php');

}
else {
	
	echo "<h3 align='center'> No existen tareas</h3>";
}