<?php
	
if(!$_POST)
{
	include_once 'Help_listar.php';
	include_once "\\..\\Modelo\\Logica.php";
	$ListaTareas=Tareas();
	include "\\..\\Vistas\\form_Vista.php";
}
