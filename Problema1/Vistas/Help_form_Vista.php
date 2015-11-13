<?php
function ListarTareas($tareas)
{
	//Escribe los datos en la lista
	foreach ($tareas as $cod => $tarea) {

		echo '<tr>';


		echo '<td>'.$tarea['idtarea'].'</td>';

		foreach ($tarea as $clave => $value) {


			if($clave == 'idtarea')
				$id = $value;
			else if($clave == 'provincia'){
				//Para escribir el nombre de la provincia y no el código
				echo '<td>'.NombreProvincias($value).'</td>';}
				else if($clave == 'f_creacion' || $clave == 'f_fin'){ //Cambiar formato a ddmmyyyy
					$date = new DateTime($value);
					echo '<td>'.date_format($date, 'd/m/Y').'</td>';
				}
				else
					echo '<td>'.$value.'</td>';
		}

		echo '<td>';

		echo '<p><a href="completartarea.php?id='.$id.'" class="btn btn-primary btn-success" title="Completar tarea"><span class="glyphicon glyphicon-ok"></span></a></p>';

		echo '<p><a href="modificar.php?id='.$id.'"class="btn btn-warning" title="Modificar Tarea"><span class="glyphicon glyphicon-pencil"></span></a></p>';

		echo '<a href="eliminar.php?id='.$id.'" class="btn btn-danger" title="Eliminar Tarea"><span class="glyphicon glyphicon-trash"></span></a>';
		
		echo '</td>';
		echo '</tr>';
	}

}