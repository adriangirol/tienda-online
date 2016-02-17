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
<form action="" method="POST">

			
			
			
<table class="form-inline" align="center">
				
				<tr>
				
					<td>
						<label for="exampleInputPoblacion">Poblacion</label>
					</td>
	    			<td> 
	    				<input type="text" class="form-control" id="exampleInputEmail1" name="Pobla" value="<?=$tarea['poblacion']?>"/>
	    			</td>
	    		
	    		<tr>
	    			<td><label for="exampleInputCP">C.Postal</label></td>
	    			<td><input type="text" class="form-control" id="exampleInputEmail1" maxlength="5" name="CP" value="<?=$tarea['cp']?>"></td>
	    		
	    		<tr>
		        <tr>
		        	<td><label for="exampleInputFF">Fecha fin :</label></td>
		        	<td><input type="text" class="form-control" id="datepicker" maxlength="10" name="fecha_f" value="<?= $tarea['f_fin']?>"> </td>
					</td>
				<tr>	
		        <tr>
		        	<td><label>Provincia:</label></td>
		        	
		        	<td><?= CreaSelect('provincia',($provincias),$provincia)?></td>
					</td>
        		<tr>
        		<tr>
		    		<td><label for="exampleInputC">Contacto</label></td>
		    		<td><input name ="nombre" type="text" class="form-control" id="nom" value="<?= $tarea['nombre_e']?>"></td>
  				<tr>
  				<tr>
		  			<td><label for="exampleInputtlf">Telefono</label></td>
		    		<td><input name="tlf" type="text" class="form-control" id="tlf" placeholder="debe insertar 9 digitos" value="<?= $tarea['TLF']?>"></td>
    			<tr>
    			<tr>
		    		<td><label for="inputEmail3">Email</label></td>
					<td><input name="correo" type="email" class="form-control" id="correo" placeholder="example@example.com" value="<?= $tarea['correo']?>"></td>
    			<tr>
    			<tr/>
		  			<td><label for="exampleInputD">Direccion</label></td>
		    		<td><input name="direccion" type="text" class="form-control" id="direccion" placeholder="Calle / Numero" value="<?=$tarea['direccion']?>"></td>
    			<tr>
    			
    			<tr/>
		  			<td><label for="exampleInputO">Operario</label></td>
		    		<td><input name="ope" type="text" class="form-control" id="ope" value="<?= $tarea['operario']?>"></td>	
    			<tr>
    			<tr>
					<td><label for="exampleInputDescripcion">Descripcion</label></td>
					<td><textarea class="form-control" rows="4" name="Descr" ><?= $tarea['descripcion']?></textarea></td>
				<tr/>
				<tr>
					<td><label for="exampleInputAno">Anotacion final</label></td>
					<td><textarea class="form-control" rows="4" name="anoF" placeholder=" Datos de interes" >
								<?= $tarea['anoD']?>
						</textarea>
					</td>
				<tr>
		    		<td><label for="exampleInputEstado">Estado</label></td>
		    		<td><div class="radio">
					    <input type="radio" name="ESTADO" id="optionsRadios1" value="Terminada" <?php if($tarea['estado']=='Completado')echo 'checked'?> >
					    <label>Terminada</label> 	
					</div>
					<div class="radio" name="ESTADO">
					    <input type="radio" name="ESTADO" id="optionsRadios2" value="Pendiente" <?php if($tarea['estado']=='Pendiente')echo 'checked'?> >
					    <label>Pendiente</label>
					</div>
					<div class="radio" name="ESTADO">
					    <input type="radio" name="ESTADO" id="optionsRadios2" value="Cancelada" <?php if($tarea['estado']=='Cancelada')echo 'checked'?>>
					    <label>Cancelada</label>
					</div></td>
				</div>
</table>	
 
		<input class="btn btn-default" type="submit" value="GUARDAR">
		
</form>	
</body>