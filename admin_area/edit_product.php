<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <?php 

 	if (isset($_GET['edit_product'])) {
 		
 		$edit_id = $_GET['edit_product'];

 		$get_p = "select * from products where product_id='$edit_id'";

 		$run_edit = mysqli_query($con, $get_p);

 		$row_edit = mysqli_fetch_array($run_edit);

 		$p_id = $row_edit['product_id'];

 		$p_title = $row_edit['product_title'];
 		
 		$p_url = $row_edit['product_url'];

 		$p_cat = $row_edit['p_cat_id']; 

 		$cat = $row_edit['cat_id']; 

 		$m_id = $row_edit['manufacturer_id'];  

 		$p_image1 = $row_edit['product_img1']; 

 		$p_image2 = $row_edit['product_img2']; 

 		$p_image3 = $row_edit['product_img3']; 

 		$p_price = $row_edit['product_price'];

 		$p_sale = $row_edit['product_sale'];  		 

 		$p_keywords = $row_edit['product_keywords']; 

 		$p_desc= $row_edit['product_desc'];

 		$p_label = $row_edit['product_label']; 
 		
 		$p_features = $row_edit['product_features'];
 		
 		$p_video = $row_edit['product_video'];  



 	}

 	$get_manufacturer = "select * from manufacturers where manufacturer_id='$m_id'";

 	$run_manufacturer = mysqli_query($con, $get_manufacturer);

 	$row_manufacturer = mysqli_fetch_array($run_manufacturer);

 	$manufacturer_id = $row_manufacturer['manufacturer_id'];

 	$manufacturer_title = $row_manufacturer['manufacturer_title'];



 	$get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";

 	$run_p_cat = mysqli_query($con, $get_p_cat);

 	$row_p_cat = mysqli_fetch_array($run_p_cat);

 	$p_cat_title = $row_p_cat['p_cat_title'];


 	$get_cat = "select * from categories where cat_id='$cat'";

 	$run_cat = mysqli_query($con, $get_cat);

 	$row_cat = mysqli_fetch_array($run_cat);

 	$cat_title = $row_cat['cat_title'];


  ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Edit Product</title>

</head>
<body>

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="breadcrumb"> <!-- breadcrumb Begin -->
				
				<li class="active"> <!-- active Begin -->
					
					<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Products

				</li> <!-- active End -->

			</div> <!-- Breadcrumb end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="panel panel-default"> <!-- panel panel-default Begin -->
				
				<div class="panel-heading"> <!-- panel-heading Begin -->
					
					<h4 class="panel-title"> <!-- panel-title Begin -->
						
						<i class="fas fa-money-bill fa-fw"></i> Edit Product

					</h4> <!-- panel-title End -->

				</div> <!-- panel-heading end -->

			<div class="panel-body"> <!-- panel-body Begin -->
				
				<form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Title</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>"></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Url</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_url" type="text" class="form-control" required value="<?php echo $p_url; ?>"></input>

							<p style="font-weight: bold; font-style: italic;">Use Dash '-' for url | Example: flowers-for-valentines</p>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Manufacturer </label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<select name="manufacturer" class="form-control"> <!-- form-control Begin -->

								<option disabled value="Select Manufacturer">Select Manufacturer</option>
								
								<option selected value="<?php echo $manufacturer_id; ?>"><?php echo $manufacturer_title; ?> </option>

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

								<option disabled value="Select Product Category">Select Product Category</option>
								
								<option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?> </option>

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

								<option disabled value="Select Category">Select Category</option>
								
								<option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>

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
							
							<input name="product_img1" type="file" class="form-control">

							<br>

							<img src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_title; ?>" width="70" height="70">

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Image 2</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_img2" type="file" class="form-control">

							<br>

							<img src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_title; ?>" width="70" height="70">

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Image 3</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_img3" type="file" class="form-control">

							<br>

							<img src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_title; ?>" width="70" height="70">

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Price</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Sale Price</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_sale" type="text" class="form-control" required value="<?php echo $p_sale; ?>" required>

							<p style="font-weight: bold; font-style: italic;">Edit the sale price if you have a sale offer</p>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Keywords</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">

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

									<textarea name="product_desc" class="form-control" id="product_desc"><?php echo $p_desc; ?></textarea>

								</div> <!--Tabs Pane End -->

								<div class="tab-pane fade in" id="features"> <!--Tabs Pane Start -->
									
									<br>

									<textarea name="product_features" class="form-control" id="product_features"><?php echo $p_features; ?></textarea>

								</div> <!--Tabs Pane End -->

								<div class="tab-pane fade in" id="videos"> <!--Tabs Pane Start -->
									
									<br>

									<textarea name="product_video" class="form-control"><?php echo $p_video; ?></textarea>

								</div> <!--Tabs Pane End -->

							</div>

						<!--Tabs Contents Begin -->	

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Product Label</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->

							<select name="product_label">

								<option disabled>Pick Product Label</option>

								<option value="<?php echo $p_label; ?>"> <?php echo $p_label; ?> </option>

								<option value="sale">Sale</option>

								<option value="new">New</option>

							</select>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"></label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="update" value="Update Product" type="submit" class="btn btn-primary form-control"></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

				</form> <!-- form-horizontal End -->

			</div> <!-- panel-body End -->

		</div> <!-- panel panel-default end -->

	</div> <!-- col-lg-12 End -->

</div> <!-- row end -->

	<script src="https://cdn.tiny.cloud/1/8j5cggbk9xum5l5hrwytwcf6twr1p3du35gfmlabpw534e3t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'#product_desc, #product_features '});</script>

</body>
</html>


<?php 
	
	if (isset($_POST['update'])) {
		
		$product_title = $_POST['product_title'];
		$product_url = $_POST['product_url'];
		$product_cat = $_POST['product_cat'];
		$cat = $_POST['cat'];
		$manufacturer_id  = $_POST['manufacturer'];
		$product_price = $_POST['product_price'];
		$product_sale = $_POST['product_sale'];
		$product_keywords = $_POST['product_keywords'];
		$product_desc = $_POST['product_desc'];
		$product_label = $_POST['product_label'];
		$product_features = $_POST['product_features'];
		$product_video = $_POST['product_video'];

		if (is_uploaded_file($_FILES['file']['tmp_name'])) {

			// work for upload / update image

			$product_img1 = $_FILES['product_img1']['name'];
			$product_img2 = $_FILES['product_img2']['name'];
			$product_img3 = $_FILES['product_img3']['name'];


			$temp_name1 = $_FILES['product_img1']['tmp_name'];
			$temp_name2 = $_FILES['product_img2']['tmp_name'];
			$temp_name3 = $_FILES['product_img3']['tmp_name'];

			move_uploaded_file($temp_name1, "product_images/$product_img1");
			move_uploaded_file($temp_name2, "product_images/$product_img2");
			move_uploaded_file($temp_name3, "product_images/$product_img3");

			$update_product = "update products set p_cat_id='$product_cat', cat_id='$cat', manufacturer_id='$manufacturer_id', date=NOW(), product_title='$product_title', product_url='$product_url' , product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_price='$product_price', product_sale='$product_sale', product_keywords='$product_keywords', product_desc='$product_desc', product_features='$product_features',  product_video='$product_video', product_label='$product_label' where product_id ='$p_id'";

			$run_product = mysqli_query($con, $update_product);

			if ($run_product) {
				
				echo "<script>alert('Product Has been Updated Sucessfully')</script>";

				echo "<script>window.open('index.php?view_products', '_self')</script>";
			}

		}

		else {

			//work when no image update

			$update_product = "update products set p_cat_id='$product_cat', cat_id='$cat', manufacturer_id='$manufacturer_id', date=NOW(), product_title='$product_title', product_url='$product_url' , product_price='$product_price', product_sale='$product_sale', product_keywords='$product_keywords', product_desc='$product_desc', product_features='$product_features', product_video='$product_video', product_label='$product_label' where product_id ='$p_id'";

			$run_product = mysqli_query($con, $update_product);

			if ($run_product) {
				
				echo "<script>alert('Product Has been Updated Sucessfully')</script>";

				echo "<script>window.open('index.php?view_products', '_self')</script>";
			}

		}


	}


 ?>

 <?php 

 	}

  ?>