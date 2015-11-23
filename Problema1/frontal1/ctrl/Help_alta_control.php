<?php
/**
 *@param unknown $descripcion
 * @param unknown $nombre
 * @param unknown $tlf
 * @param unknown $fin
 * @param unknown $correo
 * @param unknown $estado
 * @param unknown $poblacion
 * @param unknown $cp
 * @param unknown $direccion
 * @param unknown $provincia
 * @return multitype:unknown
 */
function CreaArrayTareas($descripcion,$nombre,$tlf,$fin,$correo,$estado,$poblacion,$cp,$direccion,$provincia,$anoA,$operario){

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
			'operario'=> $operario
	);

	return $Array;
}
