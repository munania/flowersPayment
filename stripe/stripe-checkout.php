<?php
  session_start();

	if (!isset($_SESSION['customer_email'])) {
		
		echo "<script>window.open('../index.php','_self')</script>";

	} else {
	
  	include("../includes/db.php");
	  include("../functions/functions.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>keskiltd</title>
	
	<meta name="Description" content="This is a description of this page for users and search engines.">
	
	<meta name="Keywords" content="flowers">
	
	<meta name="author" content="https://keskiltd.com/">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link rel="stylesheet" href="../styles/style.css">

    <!-- <link rel="stylesheet" href="checkout.css" /> -->

</head>
<body>

  <?php 
  
  $total = 0;

  $get_ip = getRealIpUser();

  $get_cart = "select * from cart where ip_add='$get_ip'";

  $run_carts = mysqli_query($con, $get_cart);

  while($row_cart=mysqli_fetch_array($run_carts)){

    $p_price = $row_cart['p_price'];

    $qty = $row_cart['qty'];

    $pro_id = $row_cart['p_id'];
    
    $get_products = "select * from products where product_id='$pro_id'";

		$run_products = mysqli_query($con, $get_products);

    $sub_total = $p_price * $qty;

    $total += $sub_total;
  
  }

		// while ($row_products=mysqli_fetch_array($run_products)) {

		//   $product_title = $row_products['product_title'];

    //   $pro_url = $row_products['product_url'];

    //   $product_img1 = $row_products['product_img1'];

    //   $only_price = $row_products['product_price'];

    //   $sub_total = $pro_sale * $pro_qty;

		//   $_SESSION['pro_qty'] = $pro_qty;

		//   $total += $sub_total;

    // $cat_title = $row_cats['cat_title'];

    // $cat_top = $row_cats['cat_top'];

  ?>

  <div class="container">
    <h2 class="my-4 text-center"><?php echo($total) ?></h2>

    <?php 
      }
    ?>
    <form action="../stripe/charge.php" method="post" id="payment-form">
      <div class="form-row">
       <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Submit Payment</button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>

