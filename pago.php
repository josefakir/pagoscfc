
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
				<h1>Realizar un pago: </h1>
				<!--PRODUCTIOV<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="3LTHFVB5H9Q4Y">
				<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
				<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
				</form>-->
				SANDBOX
				
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">

			    <!-- Identify your business so that you can collect the payments. -->
			    <input type="hidden" name="business"
			        value="compirrisfc@gmail.com">

			    <!-- Specify a Donate button. -->
			    <input type="hidden" name="cmd" value="_donations">

			    <!-- Specify details about the contribution -->
			    <input type="hidden" name="item_name" value="Compirris FC">
			    <input type="hidden" name="item_number" value="Pago de mensualidad">
			    <input type="hidden" name="currency_code" value="MXN">
	
				<input type="hidden" name="amount" value="1">


			    <!-- Display the payment button. -->
			    <input type="image" name="submit"
			    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_donate_92x26.png"
			    alt="Donate">
			    <img alt="" width="1" height="1"
			    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

			</form>

			</div>
		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>
