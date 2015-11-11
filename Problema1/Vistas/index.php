
<html>
<head>
	<meta charset="UTF-8">
	<title>Entrada</title>
	<!-- CSS de Bootstrap -->
    <link rel="stylesheet" type="text/css" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
	<body>
		<form class="form-inline" ACTION="../Controlador/inicio_controlador.php" METHOD="POST">
		  <div class="form-group">
		    <label class="sr-only">Usuario</label>
		    <input type="email" class="form-control" id="user" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputPassword3">Password</label>
		    <input type="password" class="form-control" id="pass" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-default">Entrar</button>
		</form>

	</body>
</html>