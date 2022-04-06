<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="breadcrumb"> <!-- breadcrumb Begin -->
				
				<li class="active"> <!-- active Begin -->
					
					<i class="fa fa-tachometer-alt"></i> Dashboard / Create Term

				</li> <!-- active End -->

			</div> <!-- Breadcrumb end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="panel panel-default"> <!-- panel panel-default Begin -->
				
				<div class="panel-heading"> <!-- panel-heading Begin -->
					
					<h4 class="panel-title"> <!-- panel-title Begin -->
						
						<i class="fas fa-money-bill fa-fw"></i> Create Term

					</h4> <!-- panel-title End -->

				</div> <!-- panel-heading end -->

							<div class="panel-body"> <!-- panel-body Begin -->
				
				<form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Terms Title</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="terms_title" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Terms Link</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="terms_link" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Terms Description</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<textarea name="terms_desc" cols="19" rows="6" class="form-control"></textarea>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"></label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="submit" value="Create Terms" type="submit" class="btn btn-primary form-control"></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

				</form> <!-- form-horizontal End -->

			</div> <!-- panel-body End -->

			</div> <!-- panel panel-default end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->


	<?php 

		if (isset($_POST['submit'])) {
			
			$terms_title = $_POST['terms_title'];
			
			$terms_link = $_POST['terms_link'];
			
			$terms_desc = $_POST['terms_desc'];

			$insert_term = "insert into terms (terms_title, terms_link, terms_desc) values ('$terms_title', '$terms_link', '$terms_desc') ";

			$run_term = mysqli_query($con, $insert_term);

			if ($run_term) {
				
				echo "<script> alert('Terms Created Sucessfully')</script>";

				echo "<script>window.open('index.php?view_terms', '_self')</script>";

			}

		}



	 ?>

	<script src="https://cdn.tiny.cloud/1/8j5cggbk9xum5l5hrwytwcf6twr1p3du35gfmlabpw534e3t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea'});</script>


 <?php 

 	}

  ?>