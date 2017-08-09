<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php') ?>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<img src="img/logo.jpg" alt="Logo Compirris" class="center logohome">
			<h1 class="tac">Iniciar sesión:</h1>
			<form action="login.php" method="POST">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Correo electrónico</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electrónico" name="email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Contraseña</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="pass">
			  </div>
			   <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
			   <p class="tac"><a href="registro.php">Registrarme</a></p>
			   <p class="tac error"><?php echo htmlentities(base64_decode($_GET['m'])) ?></p>
			  </form>
		</div>
	</div>
</body>
</html>