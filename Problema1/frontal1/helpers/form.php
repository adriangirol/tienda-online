<?php
/**
 * Funciones de ayuda que nos permitirán trabajar con formularios
 * 
 */

/**
 * Devuelve el valor de una variable enviada por POST. Devolverá el valor
 * por defecto en caso de no existir.
 * 
 * @param string $campo
 * @param string $default   Valor por defecto en caso de no existir
 * @return string
 */
function VPost($campo, $default='')
{
    if (isset($_POST[$campo]))
    {
        return $_POST[$campo];
    }
    else
    {
        return $default;
    }
}
function CreaArrayTareas($descripcion,$nombre,$tlf,$fin,$correo,$estado,$poblacion,$cp,$direccion,$provincia,$anoA,$anoF="",$operario){

	$Array=array(
			'descripcion'=>$descripcion,
			'nombre_e'=>$nombre,
			'TLF'=>$tlf,
			'f_fin'=>$fin,
			'correo'=>$correo,
			'estado'=>$estado,
			'poblacion'=>$poblacion,
			'cp'=>$cp,
			'direccion'=>$direccion,
			'provincia'=>$provincia,
			'anoA'=>$anoA,
			'anoD'=>$anoF,
			'operario'=> $operario
	);

	return $Array;
}