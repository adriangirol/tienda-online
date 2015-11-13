<?php
/**
 * 
 * @return multitype:Ambigous <multitype:, NULL> Devuelve Array de tareas.
 */
function Tareas(){
		$tareas=[];
		$MyBD=Database::getInstance();
		$result=[];
		$query="Select * FROM BD_PGARDEN.tarea";
		$result=$MyBD-> Consulta($query);
		
		while($linea = $MyBD -> LeeRegistro($result))
		{
			$tareas[]=$linea;
		}
		
		return $tareas;
}
	
