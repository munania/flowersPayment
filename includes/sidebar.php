<?php 
	
	$aMan = array();
	$aCat = array();
	$aPcat = array();

	// Code for Manufacturers Begin

	if (isset($_REQUEST['man'])&&is_array($_REQUEST['man'])) {

		foreach($_REQUEST['man'] as $sKey=>$sVal){

			if ((int)$sVal!=0) {
				
				$aMan[(int)$sVal] = (int)$sVal;

			}
		}
	}

	// Code for Manufacturers End

	// Code for Categories Begin

	if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {

		foreach($_REQUEST['cat'] as $sKey=>$sVal){

			if ((int)$sVal!=0) {
				
				$aCat[(int)$sVal] = (int)$sVal;

			}
		}
	}

	// Code for categories End

	// Code for product category Begin


	if (isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])) {

		foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

			if ((int)$sVal!=0) {
				
				$aPcat[(int)$sVal] = (int)$sVal;

			}
		}
	}

	// Code for product category End



 ?>


<div class="panel panel-default sidebar-menu"> <!--panel panel-default sidebar-menu Begin -->
	
	<div class="panel-heading"> <!--panel-heading Begin -->
		
		<h3 class="panel-title"> <!--panel-title Begin -->
		
			Manufactures

			<div class="pull-right"> <!--pull-right Begin -->
				
				<a href="#" style="color: black;"> <!--a Begin -->

					<span class="nav-toggle hide-show"> <!--nav-toggle hide-show Begin -->
						
						Hide

					</span> <!--nav-toggle hide-show End -->				

				</a> <!-- a End -->

			</div> <!--pull-right End -->

		</h3> <!--panel-title End -->

	</div> <!--panel-heading End -->

	<div class="panel-collapse collapse-data"> <!--panel-collapse collapse-data Begin -->

		<div class="panel-body"> <!--panel-body 1 Begin-->

			<div class="input-group"> <!--input-group Begin-->

				<input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-manufacturer" data-action="filter" placeholder="Filter Manufacturer">

					<a href="" class="input-group-addon"> <!--input-group-addon Begin-->

						<i class="fa fa-search"></i>

					</a> <!--input-group-addon End-->

			</div> <!--input-group End-->

		</div> <!--panel-body 1 End-->

		<div class="panel-body scroll-menu"> <!--panel-body 2 Begin-->
			
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"> <!--nav nav-pills nav-stacked category-menu Begin -->

				<?php
				
					$get_manufacturer = "select * from manufacturers where manufacturer_top='yes'";

					$run_manufacturer = mysqli_query($con, $get_manufacturer);

					while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)) {
						
						$manufacturer_id = $row_manufacturer['manufacturer_id'];
						
						$manufacturer_title = $row_manufacturer['manufacturer_title'];
						
						$manufacturer_image = $row_manufacturer['manufacturer_image'];

						if ($manufacturer_image=="") {
							
						}else{

							$manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px' height='20px' >&nbsp";
						}

						echo "
							<li style='background: #dddddd;' class='checkbox checkbox-primary'>

								<a>

									<label>

									<input ";

									if (isset($aMan[$manufacturer_id])) {
										echo "checked='checked'";
									}

									echo" value='$manufacturer_id' type='checkbox' class='get_manufacturer' name='manufacturer' >

									<span>

										$manufacturer_image

										$manufacturer_title

									</span>

									</label>

								</a>

							";
					}
				
					$get_manufacturer = "select * from manufacturers where manufacturer_top='no'";

					$run_manufacturer = mysqli_query($con, $get_manufacturer);

					while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)) {
						
						$manufacturer_id = $row_manufacturer['manufacturer_id'];
						
						$manufacturer_title = $row_manufacturer['manufacturer_title'];
						
						$manufacturer_image = $row_manufacturer['manufacturer_image'];

						if ($manufacturer_image=="") {
							// code...
						}else{

							$manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px' height='20px' >&nbsp";
						}

						echo "
							<li class='checkbox checkbox-primary'>

								<a>

									<label>

									<input ";

									if (isset($aMan[$manufacturer_id])) {
										echo "checked='checked'";
									}

									echo" value='$manufacturer_id' type='checkbox' class='get_manufacturer' name='manufacturer' >

									<span>

										$manufacturer_image

										$manufacturer_title

									</span>

									</label>

								</a>

							";
					}
				
				?>				

			</ul> <!--nav nav-pills nav-stacked category-menuend -->

		</div> <!--panel-body 2 End -->

	</div> <!-- panel-collapse collapse-data End -->

</div> <!--panel panel-default sidebar-menu End -->

<div class="panel panel-default sidebar-menu"> <!--panel panel-default sidebar-menu Begin -->
	
	<div class="panel-heading"> <!--panel-heading Begin -->
		
		<h3 class="panel-title"> <!--panel-title Begin -->
		
			Categories

			<div class="pull-right"> <!--pull-right Begin -->
				
				<a href="#" style="color: black;"> <!--a Begin -->

					<span class="nav-toggle hide-show"> <!--nav-toggle hide-show Begin -->
						
						Hide

					</span> <!--nav-toggle hide-show End -->				

				</a> <!-- a End -->

			</div> <!--pull-right End -->

		</h3> <!--panel-title End -->

	</div> <!--panel-heading End -->

	<div class="panel-collapse collapse-data"> <!--panel-collapse collapse-data Begin -->

		<div class="panel-body"> <!--panel-body 1 Begin-->

			<div class="input-group"> <!--input-group Begin-->

				<input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-category" data-action="filter" placeholder="Filter Categories">

					<a href="" class="input-group-addon"> <!--input-group-addon Begin-->

						<i class="fa fa-search"></i>

					</a> <!--input-group-addon End-->

			</div> <!--input-group End-->

		</div> <!--panel-body 1 End-->

		<div class="panel-body scroll-menu"> <!--panel-body 2 Begin-->
			
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-category"> <!--nav nav-pills nav-stacked category-menu Begin -->

				<?php
				
					$get_category = "select * from categories where cat_top='yes'";

					$run_category = mysqli_query($con, $get_category);

					while ($row_category=mysqli_fetch_array($run_category)) {
						
						$cat_id = $row_category['cat_id'];
						
						$cat_title = $row_category['cat_title'];
						
						$cat_image = $row_category['cat_image'];

						if ($cat_image=="") {
							
						}else{

							$cat_image = "<img src='admin_area/other_images/$cat_image' width='20px' height='20px' >&nbsp";
						}

						echo "
							<li style='background: #dddddd;' class='checkbox checkbox-primary'>

								<a>
									<label>

									<input ";

									if (isset($aCat[$cat_id])) {
										echo "checked='checked'";
									}

									echo" value='$cat_id' type='checkbox' class='get_category' name='category' >

									<span>

										$cat_image

										$cat_title

									</span>

									</label>

								</a>

							";
					}
				
					$get_category = "select * from categories where cat_top='no'";

					$run_category = mysqli_query($con, $get_category);

					while ($row_category=mysqli_fetch_array($run_category)) {
						
						$cat_id = $row_category['cat_id'];
						
						$cat_title = $row_category['cat_title'];
						
						$cat_image = $row_category['cat_image'];

						if ($cat_image=="") {
							// code...
						}else{

							$cat_image = "<img src='admin_area/other_images/$cat_image' width='20px' height='20px' >&nbsp";
						}

						echo "
							<li class='checkbox checkbox-primary'>

								<a>

									<label>

									<input ";

									if (isset($aCat[$cat_id])) {
										echo "checked='checked'";
									}

									echo" value='$cat_id' type='checkbox' class='get_category' name='category' >

									<span>

										$cat_image

										$cat_title

									</span>

									</label>

								</a>

							";
					}
				
				?>				

			</ul> <!--nav nav-pills nav-stacked category-menuend -->

		</div> <!--panel-body 2 End -->

	</div> <!-- panel-collapse collapse-data End -->

</div> <!--panel panel-default sidebar-menu End -->

<div class="panel panel-default sidebar-menu"> <!--panel panel-default sidebar-menu Begin -->
	
	<div class="panel-heading"> <!--panel-heading Begin -->
		
		<h3 class="panel-title"> <!--panel-title Begin -->
		
			Product Categories

			<div class="pull-right"> <!--pull-right Begin -->
				
				<a href="#" style="color: black;"> <!--a Begin -->

					<span class="nav-toggle hide-show"> <!--nav-toggle hide-show Begin -->
						
						Hide

					</span> <!--nav-toggle hide-show End -->				

				</a> <!-- a End -->

			</div> <!--pull-right End -->

		</h3> <!--panel-title End -->

	</div> <!--panel-heading End -->

	<div class="panel-collapse collapse-data"> <!--panel-collapse collapse-data Begin -->

		<div class="panel-body"> <!--panel-body 1 Begin-->

			<div class="input-group"> <!--input-group Begin-->

				<input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-product-category" data-action="filter" placeholder="Filter Product Categories">

					<a href="" class="input-group-addon"> <!--input-group-addon Begin-->

						<i class="fa fa-search"></i>

					</a> <!--input-group-addon End-->

			</div> <!--input-group End-->

		</div> <!--panel-body 1 End-->

		<div class="panel-body scroll-menu"> <!--panel-body 2 Begin-->
			
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-product-category"> <!--nav nav-pills nav-stacked category-menu Begin -->

				<?php
				
					$get_p_category = "select * from product_categories where p_cat_top='yes'";

					$run_p_category = mysqli_query($con, $get_p_category);

					while ($row_p_category=mysqli_fetch_array($run_p_category)) {
						
						$p_cat_id = $row_p_category['p_cat_id'];
						
						$p_cat_title = $row_p_category['p_cat_title'];
						
						$p_cat_image = $row_p_category['p_cat_image'];

						if ($p_cat_image=="") {
							// code...
						}else{

							$p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px' height='20px' >&nbsp";
						}

						echo "
							<li style='background: #dddddd;' class='checkbox checkbox-primary'>

								<a>

									<label>

									<input ";

									if (isset($aPcat[$p_cat_id])) {
										echo "checked='checked'";
									}

									echo" value='$p_cat_id' type='checkbox' class='get_p_category' name='product_category' >

									<span>

										$p_cat_image

										$p_cat_title

									</span>

									</label>

								</a>

							";
					}
				
					$get_p_category = "select * from product_categories where p_cat_top='no'";

					$run_p_category = mysqli_query($con, $get_p_category);

					while ($row_p_category=mysqli_fetch_array($run_p_category)) {
						
						$p_cat_id = $row_p_category['p_cat_id'];
						
						$p_cat_title = $row_p_category['p_cat_title'];
						
						$p_cat_image = $row_p_category['p_cat_image'];

						if ($p_cat_image=="") {
							// code...
						}else{

							$p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px' height='20px' >&nbsp";
						}

						echo "
							<li class='checkbox checkbox-primary'>

								<a>

									<label>

									<input ";

									if (isset($aPcat[$p_cat_id])) {
										echo "checked='checked'";
									}


									echo" value='$p_cat_id' type='checkbox' class='get_p_category' name='product_category' >

									<span>

										$p_cat_image

										$p_cat_title

									</span>

									</label>

								</a>

							";
					}
				
				?>				

			</ul> <!--nav nav-pills nav-stacked category-menuend -->

		</div> <!--panel-body 2 End -->

	</div> <!-- panel-collapse collapse-data End -->

</div> <!--panel panel-default sidebar-menu End -->




