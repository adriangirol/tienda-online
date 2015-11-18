<?php
function ListarTareas($tareas)
{
	//Escribe los datos en la lista
	foreach ($tareas as $cod => $tarea) {

		echo '<tr style="font-size: x-small ;">';


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

		echo '<p><a href="completartarea.php?id='.$id.'" class="btn btn-primary btn-success" title="Completar tarea">Completar</a></p>';

		echo '<p><a href="/Practica_Trimestre_1/Problema1/Controlador/CompletarTarea.php?id='.$id.'"class="btn btn-warning" title="Modificar Tarea">Modificar</a></p>';

		echo '<a href="/Practica_Trimestre_1/Problema1/Controlador/BorrarTareas.php?id='.$id.'" class="btn btn-danger" title="Eliminar" onClick="Informe()">Eliminar</a>';
		
		echo '</td>';
		echo '</tr>';
	}

}