<?php 
	
	$active = 'Shop';
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
						Terms and Conditions | Refund
					</li>
				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->

			<div class="col-md-3"> <!--col-md-3 Begin -->

				<div class="box"> <!--box Begin -->

					<ul class="nav nav-pills nav-stacked"> <!--v Begin -->
						
						<?php

							$get_terms = "select * from terms LIMIT 0,1";

							$run_terms = mysqli_query($con, $get_terms);


							while ($row_terms=mysqli_fetch_array($run_terms)) {

								$term_link = $row_terms['terms_link'];

								$term_title = $row_terms['terms_title'];


								

						?>

							<li class="active"> <!--Active Begin -->
								
								<a data-toggle="pill" href="#<?php echo $term_link; ?>">
									
									<?php echo $term_title; ?>

								</a>

							</li> <!--active End -->

						<?php

							}

						?>

						<?php 

							$count_terms = "select * from terms";

							$run_count_terms = mysqli_query($con, $count_terms);

							$count = mysqli_num_rows($run_count_terms);

							$get_terms = "select * from terms LIMIT 1,$count";

							$run_terms = mysqli_query($con, $get_terms);


							while($row_terms=mysqli_fetch_array($run_terms)){

								$term_title = $row_terms['terms_title'];

								$term_link = $row_terms['terms_link'];							
						 ?>

						 <li> <!--li Begin -->
								
								<a data-toggle="pill" href="#<?php echo $term_link; ?>">
									
									<?php echo $term_title; ?>

								</a>

						 </li> <!--li End -->

					<?php 
						
						} 
						
					?>

					</ul> <!--nav nav-pills nav-stacked End -->

				</div> <!--box End -->				


			</div> <!--col-md-3 End -->

			<div class="col-md-9"> <!--col-md-9 Begin -->

				<div class="box"> <!--box Begin -->

					<div class="tab-content"> <!--tab-content Begin -->

						<?php 

							$get_terms = "select * from terms LIMIT 0,1";

							$run_terms = mysqli_query($con, $get_terms);

							while ($row_terms=mysqli_fetch_array($run_terms)) {
								
								$term_title = $row_terms['terms_title'];

								$term_desc = $row_terms['terms_desc'];

								$term_link = $row_terms['terms_link'];

						?>

						 <div id="<?php echo $term_link; ?>" class="tab-pane fade in active"> <!--tab-pane fade in active Begin -->
						 	
						 	<h1 class="tabTitle"><?php echo $term_title; ?></h1>

						 	<p class="tabDesc"><?php echo $term_desc; ?></p>

						 </div> <!--tab-pane fade in active End -->

						 <?php 

						 	}

						  ?>

						  <?php 

							$count_terms = "select * from terms";

							$run_count_terms = mysqli_query($con, $count_terms);

							$count = mysqli_num_rows($run_count_terms);

							$get_terms = "select * from terms LIMIT 1,$count";

							$run_terms = mysqli_query($con, $get_terms);


							while($row_terms=mysqli_fetch_array($run_terms)){

								$term_title = $row_terms['terms_title'];

								$term_link = $row_terms['terms_link'];

								$term_desc = $row_terms['terms_desc'];

						 ?>

							 <div id="<?php echo $term_link; ?>" class="tab-pane fade in"> <!--tab-pane fade in Begin -->
							 	
							 	<h1 class="tabTitle"><?php echo $term_title; ?></h1>

							 	<p class="tabDesc"><?php echo $term_desc; ?></p>

							 </div> <!--tab-pane fade in End -->

						<?php 
							
							} 
							
						?>

						 

					</div> <!--tab-content End -->

				</div> <!--box End -->

			</div> <!--col-md-9 End -->



		</div> <!--container End -->
	</div> <!--content End -->





	<?php
		include("includes/footer.php");
	?>


<!-- JQUERY  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- <script src="js/jquery-331.min.js"></script> -->
<!-- <script src="js.bootstrap-337.min.js"></script> -->


</body>
</html>