<meta charset="UTF-8">
<title>Listado de tareas</title>
<head>
	
</head>
<body>

	<table class="tabla" border="solid">
	
		<tr>
			<td> Tarea </td>
			<td> Descripcion </td>
			<td> Nombre Empleado </td>
			<td> Telefono </td>
			<td> Correo </td>
			<td> Poblacion </td>
			<td> CP </td>
			<td> Direccion </td>
			<td> Provincia </td>
			<td> Estado </td>
			<td> Fecha Inicio </td>
			<td> Fecha Fin </td>
			<td> Anotacion Anterior </td>
			<td> Anotacion Final</td>
			<td>Operario</td>
			
			<?= ListarTareas($ListaTareas)?>
	</table>";
</body>
</html>