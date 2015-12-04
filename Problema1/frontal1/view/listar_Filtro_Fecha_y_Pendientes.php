<?php
/**
 * VISTA QUE MUESTA LA LISTA DE TAREAS.
 * El controlador será el que nos proporcine en la variable $tareas
 * que contiene las tareas a mostrar
 */
?>
  <?php include_once "\\ctrl\\Utilidades.php"; 
   		 include_once "\\Model\\Logica.php";
   		?>


	
	<?php if ($HayError) :?>
		<div style="border: 1px solid #ccc; color: red; text-align:left;"><ul>
	<?php foreach($errores as $textoError) {
		echo "<ul>".$textoError."</ul>";
		}
	?>
		</ul></div>
	<?php endif;?>

	<div class="table-responsive">
	<table class="table">
	
		<tr class="warning " style="font-weight: bold ;font-size: x-small;">
			<td width="1%">Tarea </td>
			<td>Descripcion</td>
			<td>Nombre Empleado</td>
			<td> Telefono</td>
			<td>Correo</td>
			<td>Poblacion</td>
			<td>CP</td>
			<td>Direccion</td>
			<td> Provincia</td>
			<td>Estado</td>
			<td> Fecha Inicio </td>
			<td> Fecha Fin </td>
			<td> Anotacion Anterior</td>
			<td> Anotacion Final</td>
			<td>Operario</td>
			
		<?php 	foreach ($FiltroTareas as $cod => $tarea) {

			echo '<tr style="font-size: x-small ;">';
	
	
			echo '<td>'.$tarea['idtarea'].'</td>';
	
			foreach ($tarea as $clave => $value) {
	
	
				if($clave == 'idtarea')
					$id = $value;
				else if($clave == 'provincia'){
					//Para escribir el nombre de la provincia y no el c�digo
					echo '<td>'.NombreProvincias($value).'</td>';}
					else if($clave == 'f_creacion' || $clave == 'f_fin'){ //Cambiar formato a ddmmyyyy
						$date = new DateTime($value);
						echo '<td>'.date_format($date, 'd/m/Y').'</td>';
					}
					else
						echo '<td>'.$value.'</td>';
			}
	
			echo '<td>';
	
			echo '<p><a href="?id='.$id.'&ctrl=CompletarTarea"" class="btn btn-primary btn-success" title="Completar tarea">Completar</a></p>';
	
			echo '<p><a href="?id='.$id.'&ctrl=Modificar"class="btn btn-warning" title="Modificar Tarea">Modificar</a></p>';
	
			echo '<a href="?id='.$id.'&ctrl=del"" class="btn btn-danger" title="Eliminar" onClick="Informe()">Eliminar</a>';
			
			echo '</td>';
			echo '</tr>';
		}
		?></table>
		</div>
		<footer align="center">
			<P>
				<?php if ($pag>1): ?>
				<a href="?ctrl=listarFiltro&pag=<?=$pag-1?>"><input class="btn btn-warning" type="button"  value ="Atras"></input></a>
				<?php endif; ?>
				<?php if ($pag<$maxPag-1) :?> 
				<a href="?ctrl=listarFiltro&pag=<?=$pag+1?>"><input class="btn btn-warning" type="button"  value ="Siguiente"></input></a>
				<?php endif;?>
			</P>
		</footer>	
	
