<html>
<head>

	<meta charset="UTF-8">
	<title>Entrada</title>
    <link rel="stylesheet" type="text/css" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
   <?php include_once "\\..\\Controlador\\Utilidades.php"; 
   			include_once "\\..\\Modelo\\Logica.php";?>
</head>

	<body>
	<? if ($hayError) :?>
	<div style="border: 1px solid #ccc; color: red"><ul>
	<?php foreach($errores as $textoError) {
		echo "<li>".$textoError."</li>";
	}
	?>
	</ul></div>
	<? endif;?>
<form action="../Controlador/alta_control.php" method="POST">

			
			<h1>DATOS DE LA TAREA</h1>
			
<table class="form-inline">
				
				<tr>
				
					<td>
						<label for="exampleInputPoblacion">Poblacion</label>
					</td>
	    			<td> 
	    				<input type="text" class="form-control" id="exampleInputEmail1" name="Pobla" value="<?=Post('Pobla')?>"/>
	    			</td>
	    		
	    		<tr>
	    			<td><label for="exampleInputCP">C.Postal</label></td>
	    			<td><input type="text" class="form-control" id="exampleInputEmail1" maxlength="5" name="CP" value="<?php Post('CP')?>"></td>
	    		
	    		<tr>
		        <tr>
		        	<td><label for="exampleInputFF">Fecha fin :</label></td>
		        	<td><input type="text" class="form-control" id="datepicker" maxlength="10" name="fecha_f" value="<?php Post('fecha_f')?>"> </td>
					</td>
				<tr>	
		        <tr>
		        	<td><label>Provincia:</label></td>
		        	
		        	<td><?= CreaSelect('provincia',($provincias))?></td>
					</td>
        		<tr>
        		<tr>
		    		<td><label for="exampleInputC">Contacto</label></td>
		    		<td><input name ="nombre" type="text" class="form-control" id="nom" value="<?php Post('nom')?>"> </td>
  				<tr>
  				<tr>
		  			<td><label for="exampleInputtlf">Telefono</label></td>
		    		<td><input name="tlf" type="text" class="form-control" id="tlf" placeholder="debe insertar 9 digitos" value="<?php Post('tlf')?>"> </td>
    			<tr>
    			<tr>
		    		<td><label for="inputEmail3">Email</label></td>
					<td><input name="correo" type="email" class="form-control" id="correo" placeholder="example@example.com" value="<?php Post('correo')?>"></td>
    			<tr>
    			<tr/>
		  			<td><label for="exampleInputD">Direccion</label></td>
		    		<td><input name="direccion" type="text" class="form-control" id="direccion" placeholder="Calle / Numero" value="<?php Post('direccion')?>"></td>
    			<tr>
    			
    			<tr/>
		  			<td><label for="exampleInputO">Operario</label></td>
		    		<td><input name="ope" type="text" class="form-control" id="ope" value="<?php Post('ope')?>"></td>	
    			<tr>
    			<tr>
					<td><label for="exampleInputDescripcion">Descripcion</label></td>
					<td><textarea class="form-control" rows="4" name="Descr" ><?php Post('Descr')?></textarea></td>
				<tr/>
				<tr>
					<td><label for="exampleInputAno">Anotacion</label></td>
					<td><textarea class="form-control" rows="4" name="anoA" placeholder=" Datos de interes" >
								<?php Post('anoA')?>
						</textarea>
					</td>
				<tr>
		    		<td><label for="exampleInputEstado">Estado</label></td>
		    		<td><div class="radio">
					    <input type="radio" name="ESTADO" id="optionsRadios1" value="Terminada" >
					    <label>Terminada</label> 	
					</div>
					<div class="radio" name="ESTADO">
					    <input type="radio" name="ESTADO" id="optionsRadios2" value="Pendiente" checked>
					    <label>Pendiente</label>
					</div>
					<div class="radio" name="ESTADO">
					    <input type="radio" name="ESTADO" id="optionsRadios2" value="Cancelada">
					    <label>Cancelada</label>
					</div></td>
				</div>
</table>	
 
		<input class="btn btn-default" type="submit" value="GUARDAR">
		
</form>	
	</body>
</html>