<?php



/**
 * 
 * @param unknown $campo
 * @param string $default
 * @return unknown|string
 */
function Post($campo, $default='')
{
	if(isset($_POST[$campo]))
		return $_POST[$campo];
	else
		return $default;

}

// La siguiente función se utilizará en la vista
/**
 * Muestra el texto de error si el campo es erroneo
 * @param string $campo Nombre campo
 */
function VerError($campo)
{
	global $errores;
	if (isset($errores[$campo]))
	{
		echo '<span style="color:red">'.$errores[$campo].'</span>';
	}
}
/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select class="form-control" name="'.$name.'">';
	foreach($opciones as $value=>$text)
	{
		if ($value==$valorDefecto)
			$select='selected="selected"';
		else
			$select="";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
	}
	$html.="\n</select>";

	return $html;
}
function CreaRadio($name,$opciones,$valorDefecto="")
{
	$html="\n";

	foreach($opciones as $value=>$text)
	{
		$html.= "<INPUT TYPE='radio' NAME=\"$name\"VALUE=\"$value\">$text";
	}
	return $html;
}

function CreaChekBox($name,$opciones,$valorDefecto="")
{
	$html="\n";
	
	foreach ($opciones as $value=>$text)
	{
		$html.= "<br>$text\t.<INPUT TYPE='checkbox' NAME=\"$name\"VALUE=\"$value\">";
	}
	return $html;
}

function CompruebaError_CampoRequerido($nombreCampo, $errores)
{
	if ($nombreCampo==='')
	{
		
		$errores[$nombreCampo]="El campo $nombreCampo esta vacio o no es correcto.";
	}
	
}

function TransformarFecha($fecha_sin_transformar){
	
	$fecha= new DateTime($fecha_sin_transformar);
	$fechaF=date_format($fecha, 'Y-m-d');
	return $fechaF;
}

function validar_fecha($fecha){
	$patronFecha='/0[1-9]|[12][0-9]|3[01])[-](0[1-9]|1[012])[-](19|20)[0-9]{2}/';
	if  ($fecha==$patronFecha) {
		return true;
	} else {
		return false;
	}
}
