
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
				<!--SANDBOX
				
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">

			    <input type="hidden" name="business"
			        value="compirrisfc@gmail.com">

			    <input type="hidden" name="cmd" value="_donations">

			    <input type="hidden" name="item_name" value="Compirris FC">
			    <input type="hidden" name="item_number" value="Pago de mensualidad">
			    <input type="hidden" name="currency_code" value="MXN">
	
				<input type="hidden" name="amount" value="1">


			    <input type="image" name="submit"
			    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_donate_92x26.png"
			    alt="Donate">
			    <img alt="" width="1" height="1"
			    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

			</form>-->

   <div id="paypal-button-container">
   	<input type="number" name="cantidad" id="cantidad" style="float: left;" placeholder="Cantidad">
   </div>
	<script>
		var cantidad = 0;
		$(document).ready(function(e){
			$('#cantidad').blur(function() {
				cantidad = $('#cantidad').val();
			});
		})
	</script>
    <script>
        paypal.Button.render({
        	locale: 'es_MX',

	        style: {
	            size: 'small',
	            shape: 'pill',
	            label: 'checkout'
	        },
            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    '<insert sandbox client id>',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: cantidad, currency: 'MXN' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                	console.log(data);
                	console.log(cantidad);
                    window.alert('El pago se ha completado!');
                });
            },
            onError: function(err) {
            	console.log(err);
	        }

        }, '#paypal-button-container');

</script>

			</div>
		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>
