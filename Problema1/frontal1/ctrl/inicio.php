<?php
// En un controlador real esto haría más cosas

include_once "\\..\\Model\\login.php";

if(!$_POST)
{
	include_once '\\view\\inicio.php';
}
else
{
	ComprobarUsuario($_POST['USUARIO'],$_POST['PASS']);

}
