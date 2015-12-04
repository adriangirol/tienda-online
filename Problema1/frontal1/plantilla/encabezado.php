<?php include_once(CTRL_PATH."Utilidades.php");?>
<header>
    <div style="background: #44AA66; font-size: 20px">
        <div style=" font-family:Verdana; text-align: center;"> <h1>GESTION DE JARDINERIA</h1> </div>
         
    
	<div class="Usuario" align="center" style=" padding-top:3em;">
	
		<form action="" method="POST">
			<table>
			<tr>
				<td>
					<label>USUARIO: </label>
				<td>
					<input type="text" name="USUARIO"  class="form-control" <?= Post('USUARIO')?>>
			<tr>
				<td>
					<label>CONTRASEÑA: &nbsp </label>
				<td>
					<input type="password" name="PASS"  class="form-control">
			<tr>
		
				<td>
				<td>
						<input class="btn btn-default" type="submit" value="INICIAR">
						<a href='?ctrl=cerrar'><input class='btn btn-default' type='button'  value ='CERRAR SESION'></input></a>
			</table>
		</form>
    </div>
   
    <?php 
    if(isset($_SESSION['usuario']))
	{
		echo"<div align='center' style='margin-left:50em; border:solid; width:12em;'>";
   		echo $_SESSION['usuario'];
   		echo "<br>";
    }
    if(isset($_SESSION['hora'])){
    	echo $_SESSION['hora'];
    	echo"</div>";
    }
    ?></div>
    
</header>

