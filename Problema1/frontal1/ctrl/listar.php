<?php
/* Muesta la lista de tareas */

include(MODEL_PATH.'tareas.php');
include_once "\\..\\Model\\Logica.php";

define ('PROXPAG', 5);
if (isset($_GET['pag']))
	$pag=$_GET['pag'];
else
	$pag=1;
$maxPag=((int) (NRegistros()-1)/PROXPAG)+1;

if ($pag<1 || $pag>$maxPag)
	$pag=1;

$posIni=(($pag-1)*PROXPAG)+1;
$ListaTareas=Tareas($posIni,PROXPAG);

// En un controlador real esto haría más cosas
include(VIEW_PATH.'listar.php');

