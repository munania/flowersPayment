<?php 

	// $db = mysqli_connect("localhost", "keskiltd_keskidb", "keskidb@!23", "keskiltd_keskidb");
	$db = mysqli_connect("localhost", "root", "", "keskiltd");



	// BEGIN getRealIpUser Function

	function getRealIpUser() {

		switch (true) {

			case (!empty($_SERVER['HTTP_X_REAL_IP'])):
				return $_SERVER['HTTP_X_REAL_IP'];
				break;

			case (!empty($_SERVER['HTTP_CLIENT_IP'])):
				return $_SERVER['HTTP_CLIENT_IP'];
				break;

			case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
				break;

			
			default:
				return $_SERVER['REMOTE_ADDR'];
				break;
		}

	}

	// END getRealIpUser Function



	// BEGIN getPro Function

	function getPro() {

		global $db;

		$get_products = "select * from products order by 1 ASC LIMIT 0,8";

		$run_products = mysqli_query($db, $get_products);

		while ($row_products=mysqli_fetch_array($run_products)){

			$pro_id = $row_products['product_id'];

			$pro_title = $row_products['product_title'];

			$pro_url = $row_products['product_url'];

			$pro_sale_price = $row_products['product_sale'];

			$pro_price = $row_products['product_price'];

			$pro_img1 = $row_products['product_img1'];

			$pro_label = $row_products['product_label'];

			$manufacturer_id = $row_products['manufacturer_id'];

			$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

			$run_manufacturer = mysqli_query($db, $get_manufacturer);

			$row_manufacturer = mysqli_fetch_array($run_manufacturer);

			$manufacturer_title = $row_manufacturer['manufacturer_title'];

			if ($pro_label == 'sale') {
				
				$pro_price = "<del> KES $pro_price </del>";

				$pro_sale_price = "/ KES $pro_sale_price";

			} else {

				$pro_price = " KES $pro_price ";

				$pro_sale_price = "";

			}

			if ($pro_label == "") {
				// code...
			}else{

				$product_label = "

					<a href='#' class='label $pro_label'>

						<div class='theLabel'> $pro_label </div>
						<div class='labelBackground'> </div>

					</a>

				";
			}

			echo "

				<div class='col-md-4 col-sm-6 single'>

					<div class='product'>

						<a href='$pro_url'>

							<img class='img-responsive' src='admin_area/product_images/$pro_img1'>

						</a>

						<div class='text'>

							<center>

								<p class='btn man'> $manufacturer_title </p>

							</center>

							<h3>

								<a href='$pro_url'>

									$pro_title

								</a>

							</h3>

							<p class='price'>

								$pro_price &nbsp;$pro_sale_price

							</P>

							<p class='button'>

								<a class='btn details' href='$pro_url'>

									View Details

								</a>

								<a class='btn cart' href='$pro_url'>

									<i class='fa fa-shopping-cart'></i> Add to cart

								</a>

							</P>

						</div>

						$product_label

					</div>

				</div>

			";

		}

	}	

	// BEGIN items Function

	function items() {

		global $db;

		$ip_add = getRealIpUser();

		$get_items = "select * from cart where ip_add='$ip_add'";

		$run_items = mysqli_query($db, $get_items);

		$count_items = mysqli_num_rows($run_items);

		echo $count_items;
	}

	// END items Function

	// BEGIN total_price Function

	function total_price() {

		global $db;

		$ip_add = getRealIpUser();

		$total = 0;

		$select_cart = "select * from cart where ip_add='$ip_add'";

		$run_cart = mysqli_query($db, $select_cart);

		while ($record=mysqli_fetch_array($run_cart)) {
			
			$pro_id = $record['p_id'];

			$pro_qty = $record['qty'];

			$sub_total = $record['p_price'] * $pro_qty;

			$total += $sub_total;

		}

		echo " KES " . $total;

	}

	// END total_price Function


	// START getProducts Function

	function getProducts(){

		global $db;

		$aWhere = array();

		// BEGIN for manufacturer Function

		if (isset($_REQUEST['man'])&&is_array($_REQUEST['man'])) {
			
			foreach($_REQUEST['man'] as $sKey=>$sVal){

				if ((int)$sVal!=0) {
					 
					 $aWhere[] = 'manufacturer_id='.(int)$sVal;
				}
			}
		}

		// END for manufacturer Function


		// BEGIN for product categories Function

		if (isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])) {
			
			foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

				if ((int)$sVal!=0) {
					 
					 $aWhere[] = 'p_cat_id='.(int)$sVal;
				}
			}
		}

		// END for product categories Function

		// BEGIN for categories Function

		if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {
			
			foreach($_REQUEST['cat'] as $sKey=>$sVal){

				if ((int)$sVal!=0) {
					 
					 $aWhere[] = 'cat_id='.(int)$sVal;
				}
			}
		}

		// END for categories Function

		$per_page=6;

		if (isset($_GET['page'])) {
			
			$page = $_GET['page'];
		} else{

			$page=1;
		}

		$start_from = ($page-1) * $per_page;
		$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
		$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ', $aWhere): '').$sLimit;
		$get_products = " select * from products ".$sWhere;
		$run_products = mysqli_query($db, $get_products);

		while ($row_products=mysqli_fetch_array($run_products)) {

			$pro_id = $row_products['product_id'];

			$pro_title = $row_products['product_title'];

			$pro_sale_price = $row_products['product_sale'];

			$pro_url = $row_products['product_url'];

			$pro_price = $row_products['product_price'];

			$pro_img1 = $row_products['product_img1'];

			$pro_label = $row_products['product_label'];

			$manufacturer_id = $row_products['manufacturer_id'];

			$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

			$run_manufacturer = mysqli_query($db, $get_manufacturer);

			$row_manufacturer = mysqli_fetch_array($run_manufacturer);

			$manufacturer_title = $row_manufacturer['manufacturer_title'];

			if ($pro_label == 'sale') {
				
				$pro_price = "<del> KES $pro_price </del>";

				$pro_sale_price = "/ KES $pro_sale_price";

			} else {

				$pro_price = " KES $pro_price ";

				$pro_sale_price = "";

			}

			if ($pro_label == "") {
				// code...
			}else{

				$product_label = "

					<a href='#' class='label $pro_label'>

						<div class='theLabel'> $pro_label </div>
						<div class='labelBackground'> </div>

					</a>

				";
			}

			echo "

				<div class='col-md-4 col-sm-6 center-responsive'>

					<div class='product'>

						<a href='$pro_url'>

							<img class='img-responsive' src='admin_area/product_images/$pro_img1'>

						</a>

						<div class='text'>

							<center>

								<p class='btn man'> $manufacturer_title </p>

							</center>

							<h3>

								<a href='$pro_url'>

									$pro_title

								</a>

							</h3>

							<p class='price'>

								$pro_price &nbsp;$pro_sale_price

							</P>

							<p class='button'>

								<a class='btn details' href='$pro_url'>

									View Details

								</a>

								<a class='btn cart' href='$pro_url'>

									<i class='fa fa-shopping-cart'></i> Add to cart

								</a>

							</P>

						</div>

						$product_label

					</div>

				</div>

			";

		}



	}

	// END getProducts Function

	// BEGIN getPaginator Function

	function getPaginator(){

		global $db;

		$per_page=6;
		$aWhere = array();
		$aPath = '';

		// BEGIN for manufacturer Function

		if (isset($_REQUEST['man'])&&is_array($_REQUEST['man'])) {
			
			foreach($_REQUEST['man'] as $sKey=>$sVal){

				if ((int)$sVal!=0) {
					 
					 $aWhere[] = 'manufacturer_id='.(int)$sVal;
					 $aPath .= 'man[]='.(int)$sVal.'&';


				}
			}
		}

		// END for manufacturer Function


		// BEGIN for product categories Function

		if (isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])) {
			
			foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

				if ((int)$sVal!=0) {
					 
					 $aWhere[] = 'p_cat_id='.(int)$sVal;
					 $aPath .= 'p_cat[]='.(int)$sVal.'&';

				}
			}
		}

		// END for product categories Function

		// BEGIN for categories Function

		if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {
			
			foreach($_REQUEST['cat'] as $sKey=>$sVal){

				if ((int)$sVal!=0) {
					 
					 $aWhere[] = 'cat_id='.(int)$sVal;
					 $aPath .= 'cat[]='.(int)$sVal.'&';

				}
			}
		}

		// END for categories Function

		$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ', $aWhere): '');
		$query = " select * from products ".$sWhere;
		$result = mysqli_query($db, $query);
		$total_records = mysqli_num_rows($result);
		$total_pages = ceil($total_records / $per_page);

		echo "<li class='paginator'> <a href='shop.php?page=1";

		if (!empty($aPath)) {
			
			echo "&".$aPath;
		}

		echo "'>".'First Page'."</a></li>";

		for ($i=1; $i<=$total_pages; $i++) { 
				
			echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";
		};
		
		echo "<li class='paginator'> <a href='shop.php?page=$total_pages";

		if (!empty($aPath)) {
			
			echo "&".$aPath;
		}

		echo "'>".'Last Page'."</a></li>";



	}

	// END getPaginator Function



 ?>