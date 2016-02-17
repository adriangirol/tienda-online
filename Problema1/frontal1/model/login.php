<?php

function LoginOk($user,$clave){
    
    if ($user =="operario" && $clave=="user")
    {
        $_SESSION["dentro"]= "SI";
        $_SESSION['usuario']="operario";
        $_SESSION["hora"]= date("H:m:s");
       
        return true;
    }
    
    if($user == "administrador" && $clave =="admin"){
        $_SESSION["dentro"]= "SI";
		$_SESSION['usuario']="administrador";
		$_SESSION["hora"]= date("H:m:s");
		return true;
    }
    return false;  
   
}

function Estadentro(){
    if (!isset($_SESSION["dentro"]))
    {
    	return false;
    }
    if($_SESSION["dentro"]== "SI"){
        
        return true;
        }
        else {
            return false;
            
        }
}

function TipoUsuario(){
    return $_SESSION['usuario'];
}

function Esadministrador(){
    
    if($_SESSION['usuario']=="admin"){
    return true;
    }else 
    {
    return false;
    }
    
}

function NombreUsuario()
{
    return $_SESSION['usuario'];
}
