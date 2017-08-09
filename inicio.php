<?php 
	include("auth.php");
	include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php') ?>
</head>
<body>
	<header>
		<div class="container">
			<a href="#" id="logo"><img src="img/logo.png" alt=""></a>
			<a id="triggermenu" href=""><i class="fa fa-bars" aria-hidden="true"></i></a>
		</div>
	</header>
	<div id="content">
		<?php 
			$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
			$sql = "SELECT * FROM jugador ORDER BY numero";
		    $q = $dbh->prepare($sql);
		    $q->execute(
		    );
		    $result= $q->fetchAll();

		?>
		<div class="container">
			<div class="col-md-12">
				<h1>Jugadores: </h1>
				<div class="table-responsive">
  				<table class="table">
  				<tr>
  					<th>Número</th>
  					<th>Nombre</th>
  					<th>Pagado</th>
  					<th>Vencido</th>
  					<th>Restante</th>
  					<th>Total</th>
  					<th>Historial</th>
  				</tr>
				<?php 
					foreach($result as $r){
						?>
						<tr>
							<td><?php echo $r['numero'] ?></td>
							<td><?php echo utf8_encode($r['nombre'])." ".$r['paterno']." ".$r['materno'] ?></td>
							<td>100.00</td>
							<td>50.00</td>
							<td>50.00</td>
							<td>2154.00</td>
							<td><a href="historial.php?id=<?php echo $r['id'] ?>">Ver</a></td>
						</tr>
						<?php
					}
				?>
				</table>
				</div>
				<p><a href="pago.php" class="btn btn-primary">Realizar un pago</a></p>
			</div>
		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>