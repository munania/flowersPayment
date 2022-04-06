<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Insert Product</title>

</head>
<body>

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="breadcrumb"> <!-- breadcrumb Begin -->
				
				<li class="active"> <!-- active Begin -->
					
					<i class="fa fa-tachometer-alt"></i> Dashboard / Insert Products

				</li> <!-- active End -->

			</div> <!-- Breadcrumb end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="panel panel-default"> <!-- panel panel-default Begin -->
				
				<div class="panel-heading"> <!-- panel-heading Begin -->
					
					<h4 class="panel-title"> <!-- panel-title Begin -->
						
						<i class="fas fa-money-bill fa-fw"></i> Insert Product

					</h4> <!-- panel-title End -->

				</div> <!-- panel-heading end -->

							<div class="panel-body"> <!-- panel-body Begin -->
				
				<form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Title</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_title" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Url</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_url" type="text" class="form-control" required placeholder="flowers-for-valentines"></input>

							<p style="font-weight: bold; font-style: italic;">Use Dash '-' for url | Example: flowers-for-valentines</p>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Manufacturer</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<select name="manufacturer" class="form-control"> <!-- form-control Begin -->
								
								<option selected disabled> Select a manufacurer</option>

								<?php 

									$get_manufacturer = "select * from manufacturers";

									$run_manufacturer = mysqli_query($con, $get_manufacturer);

									while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

										$manufacturer_id = $row_manufacturer['manufacturer_id'];

										$manufacturer_title = $row_manufacturer['manufacturer_title'];

										echo "

											<option value='$manufacturer_id'> $manufacturer_title </option>

										";

									}


								 ?>

							</select> <!-- form-control End -->

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Category</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<select name="product_cat" class="form-control"> <!-- form-control Begin -->
								
								<option selected disabled> Select product category</option>

								<?php 

									$get_p_cats = "select * from product_categories";

									$run_p_cats = mysqli_query($con, $get_p_cats);

									while ($row_p_cats=mysqli_fetch_array($run_p_cats)){

										$p_cat_id = $row_p_cats['p_cat_id'];

										$p_cat_title = $row_p_cats['p_cat_title'];

										echo "

											<option value='$p_cat_id'> $p_cat_title </option>

										";

									}


								 ?>

							</select> <!-- form-control End -->

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Category</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<select name="cat" class="form-control"> <!-- form-control Begin -->
								
								<option selected disabled> Select a category</option>

								<?php 

									$get_cat = "select * from categories";

									$run_cat = mysqli_query($con, $get_cat);

									while ($row_cat=mysqli_fetch_array($run_cat)){

										$cat_id = $row_cat['cat_id'];

										$cat_title = $row_cat['cat_title'];

										echo "

											<option value='$cat_id'> $cat_title </option>

										";

									}


								 ?>

							</select> <!-- form-control End -->

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product image 1</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_img1" type="file" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Image 2</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_img2" type="file" class="form-control" ></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Image 3</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_img3" type="file" class="form-control" ></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Price</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_price" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Sale Price </label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input value="0" name="product_sale" type="text" class="form-control" required></input>

							<p style="font-weight: bold; font-style: italic;">Input a sale price if you have a sale offer</p>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Keywords</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_keywords" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Descriptions</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

								<li class="active">

									<a data-toggle="tab" href="#descriptions" class="tab_link">
										Product Description
									</a>

								</li>

								<li>

									<a data-toggle="tab" href="#features" class="table_link">
										Product Features
									</a>

								</li>

								<li>

									<a data-toggle="tab" href="#videos" class="tab_link">
										Product Videos
									</a>

								</li>

							</ul> <!-- nav nav-tabs Ends -->

							<!--Tabs Contents Begin -->	

							<div class="tab-content">

								<div class="tab-pane fade in active" id="descriptions"> <!--Tabs Pane Start -->
									
									<br>

									<textarea name="product_desc" class="form-control" id="product_desc"></textarea>

								</div> <!--Tabs Pane End -->

								<div class="tab-pane fade in" id="features"> <!--Tabs Pane Start -->
									
									<br>

									<textarea name="product_features" class="form-control" id="product_features"></textarea>

								</div> <!--Tabs Pane End -->

								<div class="tab-pane fade in" id="videos"> <!--Tabs Pane Start -->
									
									<br>

									<textarea name="product_video" class="form-control"></textarea>

								</div> <!--Tabs Pane End -->

							</div>

						<!--Tabs Contents Begin -->	

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Label</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->

							<select name="product_label">
								
								<option selected disabled>Pick Product Label</option>
								<option value="sale">Sale</option>
								<option value="new">New</option>

							</select>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"></label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control"></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

				</form> <!-- form-horizontal End -->

			</div> <!-- panel-body End -->

			</div> <!-- panel panel-default end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->

	<script src="https://cdn.tiny.cloud/1/8j5cggbk9xum5l5hrwytwcf6twr1p3du35gfmlabpw534e3t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea'});</script>

</body>
</html>


<?php 
	
	if (isset($_POST['submit'])) {
		
		$product_title = $_POST['product_title'];
		$product_url = $_POST['product_url'];
		$product_cat = $_POST['product_cat'];
		$cat = $_POST['cat'];
		$manufacturer_id = $_POST['manufacturer'];
		$product_price = $_POST['product_price'];
		$product_sale = $_POST['product_sale'];
		$product_keywords = $_POST['product_keywords'];
		$product_desc = $_POST['product_desc'];
		$product_features = $_POST['product_features'];
		$product_video = $_POST['product_video'];
		$product_label = $_POST['product_label'];

		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];


		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];

		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");

		$insert_product = "insert into products (p_cat_id, cat_id, manufacturer_id, date, product_title, product_url, product_img1, product_img2, product_img3, product_price, product_keywords, product_desc,product_features,product_video,  product_label, product_sale) values ('$product_cat', '$cat', '$manufacturer_id', NOW(), '$product_title', '$product_url' , '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc','$product_features','$product_video', '$product_label', '$product_sale')";

		$run_product = mysqli_query($con,$insert_product);

		if ($run_product) {
			
			echo "<script> alert('Product Has been Inserted Sucessfully')</script>";

			echo "<script>window.open('index.php?view_products', '_self')</script>";


		}

	}


 ?>

 <?php 

 	}

  ?>