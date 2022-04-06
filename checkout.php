<?php 
	
	$active = 'My Account';
	include("includes/header.php");

 ?>



	<div id="content"> <!--content Begin -->
		
		<div class="container"> <!--container Begin -->
			
			<div class="col-md-12"> <!--col-md-12 Begin -->


				<ul class="breadcrumb"> <!--breadcrumb Begin -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						Login
					</li>
				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->

			<div class="col-md-12"> <!--col-md-12 Begin -->

			<?php 

        
		$session_email = $_SESSION['customer_email'];

		$select_customer = "select * from customers where customer_email='$session_email'";

		$run_customer = mysqli_query($con, $select_customer);

		$row_customer = mysqli_fetch_array($run_customer);

		$customer_id = $row_customer['customer_id'];


        $ip_add = getRealIpUser();

		$select_cart = "select * from cart where ip_add='$ip_add'";

		$run_cart = mysqli_query($con, $select_cart);

        $count = mysqli_num_rows($run_cart);

        $total = 0;

		while ($row_cart=mysqli_fetch_array($run_cart)) {

		$pro_id = $row_cart['p_id'];

		$pro_qty = $row_cart['qty'];

		$pro_sale = $row_cart['p_price'];

		$get_products = "select * from products where product_id='$pro_id'";

		$run_products = mysqli_query($con, $get_products);

		while ($row_products=mysqli_fetch_array($run_products)) {

		$product_title = $row_products['product_title'];

		$pro_url = $row_products['product_url'];

		$product_img1 = $row_products['product_img1'];

		$only_price = $row_products['product_price'];

		$sub_total = $pro_sale * $pro_qty;

		$_SESSION['pro_qty'] = $pro_qty;

		$total += $sub_total;

        }}

		

	 ?>

			<?php 

				if (!isset($_SESSION['customer_email'])) {
					
					include("customer/customer_login.php");
					
				} else {

					include("payment_options.php");
				}



			 ?>

			</div> <!--col-md-12 End -->



			</div> <!--container End -->
	</div> <!--content End -->





	<?php
		include("includes/footer.php");
	?>

<script>
     function makePayment() {
  FlutterwaveCheckout({
    public_key: "FLWPUBK_TEST-b30dc0f94322cbf898b2a5331603cfe2-X",
    tx_ref: "titanic-48981487343MDI0NzMx",
    amount: <?php echo($total); ?>,
    currency: "KES",
    payment_options: "card",

    callback: function(payment) {
        // Send AJAX verification request to backend
        verifyTransactionOnBackend(payment.id);
      },
      onclose: function(incomplete) {
        if (incomplete || window.verified === false) {
          document.querySelector("#payment-failed").style.display = 'block';
        } else {
          document.querySelector("form").style.display = 'none';
          if (window.verified == true) {
            document.querySelector("#payment-success").style.display = 'block';
          } else {
            document.querySelector("#payment-pending").style.display = 'block';
          }
        }
      },

    // redirect_url: "http://localhost/well-known/flutterwave/success.php/",
    meta: {
      consumer_id: 23,
      consumer_mac: "92a3-912ba-1192a",
    },
    customer: {
      email: "<?php echo($session_email); ?>",
      phone_number: "0710290934",
      name: "Rose DeWitt Bukater",
    },
    customizations: {
      title: "The Titanic Store",
      description: "Payment for an awesome cruise",
      logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
    },
  });

  function verifyTransactionOnBackend(transactionId) {
    // Let's just pretend the request was successful
    setTimeout(function() {
      window.verified = true;
    }, 200);
  }
}
</script>


<!-- JQUERY  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- <script src="js/jquery-331.min.js"></script> -->
<!-- <script src="js.bootstrap-337.min.js"></script> -->




</body>
</html>