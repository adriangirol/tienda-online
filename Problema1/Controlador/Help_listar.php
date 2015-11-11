<?php

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

function ListarTareas($tareas)
{
//Escribe los datos en la lista
	foreach ($tareas as $cod => $tarea) {
		
		echo '<tr>';
		echo "<pre>";
					print_r($tarea);
				echo "</pre>";

			echo '<td>'.$tarea['idtarea'].'</td>';

			foreach ($tarea as $clave => $value) {	
				

					if($clave == 'idtarea')
						$id = $value;
					else if($clave == 'provincia'){
						echo"<p> $clave. --> .$value </p>";//Para escribir el nombre de la provincia y no el código		
						echo '<td>'.NombreProvincias($value).'</td>';}
					else if($clave == 'f_creacion' || $clave == 'f_fin'){ //Cambiar formato a ddmmyyyy							
						$date = new DateTime($value);
						echo '<td>'.date_format($date, 'd-m-Y').'</td>';	
					}
					else 
						echo '<td>'.$value.'</td>';
			}
				
			echo '<td>';

				/*echo '<p><a href="completartarea.php?id='.$id.'" class="btn btn-primary btn-success" title="Completar tarea"><span class="glyphicon glyphicon-ok"></span></a></p>';

				echo '<p><a href="modificar.php?id='.$id.'"class="btn btn-warning" title="Modificar Tarea"><span class="glyphicon glyphicon-pencil"></span></a></p>';
				
				echo '<a href="eliminar.php?id='.$id.'" class="btn btn-danger" title="Eliminar Tarea"><span class="glyphicon glyphicon-trash"></span></a>';				
				*/
			echo '</td>';
		echo '</tr>';
	}

}

function NombreProvincias($id)
{
	$bdatos=Database::getInstance();
	$query="SELECT bd_pgarden.tbl_provincias.nombre FROM bd_pgarden.tbl_provincias WHERE tbl_provincias.cod=.$id ";
	$res=$bdatos->Consulta($query);
	echo "<pre>";
	print_r($res);
	echo"</pre>";
	$registro=$bdatos ->LeeRegistro();
	echo "<pre>";
	print_r($registro);
	echo"</pre>";
	return $registro['nombre'];
}
