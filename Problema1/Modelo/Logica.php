<?php


include_once '\\..\\Instalador\\BD.php';



function obtenerProvincias(){
$a=[];
$bdatos=Database::getInstance();
$a=$bdatos ->Consulta("SELECT p.cod , p.nombre from bd_pgarden.tbl_provincias p");

while ($line= mysqli_fetch_array($a,MYSQL_ASSOC))
{
	$provincias[$line['cod']]=$line['nombre'];
}
return $provincias;
}


/**
* 
*  
*  @param unknown $id
* @return Ambigous <>
*/
function NombreProvincias($id)
{
	$bdatos=Database::getInstance();
	$query='SELECT bd_pgarden.tbl_provincias.nombre FROM bd_pgarden.tbl_provincias WHERE tbl_provincias.cod='.$id ;
	$res=$bdatos->Consulta($query);
	$registro=$bdatos ->LeeRegistro();

	return $registro['nombre'];
}