<?php 

	$active ='Home';
	include("includes/header.php");

 ?>

	<!-- //////////////////////////////////////////////////// -->

	<div class="container" id="slider"> <!--container Begin -->

		<div class="col-md-12"> <!--col-md-12 Begin -->

			<div class="carousel slide" id="myCarousel" data-ride="carousel"> <!-- carousel slider Begin -->

				<ol class="carousel-indicators"> <!--carousel-indicators Begin -->

					<li class="active" data-target="#myCarousel" data-slide-to="0"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					
				</ol> <!--carousel-indicators end -->

				<div class="carousel-inner"> <!--carousel-inner Begin -->

					
					<?php 


						$get_slides = "select * from slider LIMIT 0,1";

						$run_slides = mysqli_query($con,$get_slides);

						while ($row_slides=mysqli_fetch_array($run_slides)) {
							
							$slide_name = $row_slides['slide_name'];

							$slide_image = $row_slides['slide_image'];

							$slide_url = $row_slides['slide_url'];

							echo "

								<div class='item active'>

									<a href='$slide_url'>
 
										<img src='admin_area/slides_images/$slide_image' >

									</a>

								</div>


							";

						}

						$get_slides = "select * from slider LIMIT 1,3";

						$run_slides = mysqli_query($con,$get_slides);

						while ($row_slides=mysqli_fetch_array($run_slides)) {
							
							$slide_name = $row_slides['slide_name'];

							$slide_image = $row_slides['slide_image'];

							$slide_url = $row_slides['slide_url'];

							echo "

								<div class='item'>

									<a href='$slide_url'>
 
										<img src='admin_area/slides_images/$slide_image' >

									</a>

								</div>


							";

						}

					 ?>

					 
				</div> <!--carousel-inner end -->

				<a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!--left carousel-contro Begin -->

					<span class="glyphicon glyphicon-chevron-left"> <!--glyphicon glyphicon-cevron-left Begin -->

						<span class="sr-only">Previous</span>
						
					</span> <!--glyphicon glyphicon-cevron-left end -->
					
				</a> <!--left carousel-contro end -->

				<a href="#myCarousel" class="right carousel-control" data-slide="next"> <!--left carousel-contro Begin -->

					<span class="glyphicon glyphicon-chevron-right"> <!--glyphicon glyphicon-cevron-left Begin -->

						<span class="sr-only">Next</span>
						
					</span> <!--glyphicon glyphicon-cevron-left end -->
					
				</a> <!--left carousel-contro end -->	 			

			</div> <!--carousel slider end -->
			
		</div> <!--col-md-12 end -->

		
	</div> <!--container End -->


	<!-- //////////////////////////////////////////////////// -->

	<div id="advantages"> <!--advantages Begin -->

		<div class="container"> <!--container Begin -->

			<div class="same-height-row"> <!--same-height-rowBegin -->

				<?php

					$get_boxes = "select * from boxes_section";

					$run_boxes = mysqli_query($con, $get_boxes);

					while ($run_boxes_section=mysqli_fetch_array($run_boxes)) {
					 	
					 	$box_id = $run_boxes_section['box_id'];

					 	$box_title = $run_boxes_section['box_title'];

					 	$box_desc = $run_boxes_section['box_desc'];

					 

				 ?>

				<div class="col-sm-4"> <!--col-sm-4 Begin -->

					<div class="box same-height"> <!--box same-height Begin -->

						<div class="icon"><!--icon Begin -->

							<i class="fa fa-heart"></i>
							
						</div> <!--icon End -->

						<h3><a href="#"><?php echo $box_title; ?></a></h3>

						<p><?php echo $box_desc; ?></p>

					</div> <!--box same-height End -->
					

				</div> <!--col-sm-4 End -->


				<?php 

					} 

				 ?>
					

				</div> <!--col-sm-4 End -->


			</div> <!--same-height-row End -->
			
		</div> <!--container End -->
		



	</div> <!--advantages End -->


	<div id="hot"> <!--hot Begin -->

		<div class="box"> <!--box Begin -->

			<div class="container"> <!--container Begin -->

				<div class="col-md-12"> <!--col-md-12 Begin -->

					<h2>
						Our Latest Products
					</h2>


				</div> <!--col-md-12 End -->
				

			</div> <!--container End -->
			
		</div> <!--box End -->
		
	</div> <!--hot End -->


	<div id="content" class="container"> <!--container Begin -->

		<div class="row"> <!--row Begin -->

			<?php 

				getPro();

			 ?>

		</div> <!--row End -->	

	</div> <!--container End -->


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