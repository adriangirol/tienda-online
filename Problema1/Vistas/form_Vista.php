<meta charset="UTF-8">
<title>Listado de tareas</title>
<head>
	<?php include_once "Help_form_Vista.php"?>
	 <link rel="stylesheet" type="text/css" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
	<h1> LISTA DE TAREAS </h1>
	<div class="table-responsive">
	<table class="table">
	
		<tr class="warning">
			<td width="1%"><div class="Encabezado">Tarea</div>  </td>
			<td><div class="Encabezado"> Descripcion </div></td>
			<td><div class="Encabezado"> Nombre Empleado </div></td>
			<td><div class="Encabezado"> Telefono </div></td>
			<td><div class="Encabezado"> Correo </div></td>
			<td><div class="Encabezado"> Poblacion </div></td>
			<td><div class="Encabezado"> CP </div></td>
			<td width="33%"><div class="Encabezado"> Direccion </div></td>
			<td><div class="Encabezado"> Provincia </div></td>
			<td><div class="Encabezado"> Estado </div></td>
			<td width="40%"><div class="Encabezado"> Fecha Inicio </div></td>
			<td width="50%"><div class="Encabezado"> Fecha Fin </div></td>
			<td><div class="Encabezado"> Anotacion Anterior</div></td>
			<td><div class="Encabezado"> Anotacion Final</div></td>
			<td><div class="Encabezado">Operario</div></td>
			
			<?= ListarTareas($ListaTareas)?>
	</table>
	</div>
</body>
</html>