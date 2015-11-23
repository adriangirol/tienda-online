<?php
/**
 * VISTA QUE MUESTA LA LISTA DE TAREAS.
 * El controlador será el que nos proporcine en la variable $tareas
 * que contiene las tareas a mostrar
 */
?>

	
	<?php include_once "Help_form_Vista.php"?>
	


	
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
			
			<?= ListarTareas($ListaTareas)?>
		<footer>
			<P>
				<?php if ($pag>1): ?>
				<a href="?ctrl=listar&pag=<?=$pag-1?>"><input class="btn btn-warning" type="button"  value ="Atras"></input></a>
				<?php endif; ?>
				<?php if ($pag<$maxPag-1) :?> 
				<a href="?ctrl=listar&pag=<?=$pag+1?>"><input class="btn btn-warning" type="button"  value ="Siguiente"></input></a>
				<?php endif;?>
			</P>
		</footer>	
	</table>
	</div>
