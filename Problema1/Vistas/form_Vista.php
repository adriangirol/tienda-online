<meta charset="UTF-8">
<title>Listado de tareas</title>
<head>
	
	<?php include_once "Help_form_Vista.php"?>
	<link rel="stylesheet" type="text/css" src="\\..\\css\\style.css">
	 <link rel="stylesheet" type="text/css" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
	<h1> LISTA DE TAREAS </h1>
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
	</table>
	</div>
</body>
</html>