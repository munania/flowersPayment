<?php

  session_start();
  include('../includes/db.php');
	include("../functions/functions.php");

?>

<div class="box"> <!-- box Begin -->

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

      }
    }		

	 ?>
	
	<h1 class="text-center"> Payment Options for you </h1>

	<script src="https://checkout.flutterwave.com/v3.js"></script>

 <button type="button" onclick="makePayment()">Pay Now</button>

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