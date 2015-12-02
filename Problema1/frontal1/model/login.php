<?php

function ComprobarUsuario($usuario,$clave){

	$admin="administrador";
	$pass_admin="admin";

	$user="usuario";
	$pass_user="user";

	if($usuario==$admin && $clave==$pass_admin)
	{
		
		session_start();
		$_SESSION["autentificado"]= "SI";
		$_SESSION['usuario']="admin";

	}
	else if($usuario==$user && $clave==$pass_user)
	{
		session_start();
		$_SESSION["autentificado"]= "SI";
		$_SESSION['usuario']="operario";
	}
	else {
		$_SESSION["autentificado"]= "NO";
	}

}