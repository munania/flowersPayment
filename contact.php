<?php 
	
	$active = 'Contact Us';
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
						Contact Us
					</li>
				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->

			<div class="col-md-12"> <!--col-md-12 Begin -->

				<div class="box"> <!--box Begin -->
					
					<div class="box-header"> <!--box-header Begin -->
						
						<center> <!--center Begin -->
							
							<h1>Feel Free to Contact Us</h1>

							<p class="text-muted"> <!--text-muted Begin -->
								
								If You Have any Questions feel free to contact us. Our customer service works	<strong>24/7</strong>

							</p> <!--text-muted End -->

						</center> <!--center End -->

						<form action="contact.php" method="post"> <!--form Begin -->
							
							<div class="form-group"> <!--form-group Begin -->
								
								<label>Name</label>

								<input type="text" class="form-control" name="name" required="">

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Email</label>

								<input type="text" class="form-control" name="email" required="">

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Subject</label>

								<input type="text" class="form-control" name="subject" required="">

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Message</label>

								<textarea name="message" class="form-control"></textarea>

							</div> <!--form-group End -->

							<div class="text-center"> <!--text-center Begin -->

								<button  type="submit" name="submit" class="btn cart"> <!--btn btn-primary Begin -->
									
									<i class="fas fa-paper-plane"></i> Send Message

								</button> <!--btn btn-primary End -->

							</div> <!--text-center End -->

						</form> <!--form End-->

						<?php 

							if (isset($_POST['submit'])) {
								
								//Admin receives message with this //

								$sender_name = $_POST['name'];

								$sender_email = $_POST['email'];

								$sender_subject = $_POST['subject'];

								$sender_message = $_POST['message'];

								$receiver_email = "Fult1932@armyspy.com";

								mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);

								// Auto reply to sender with this //

								$email = $_POST['email'];

								$subject = "Welcome to my website";

								$msg = "Thanks for reachng out to us. We will reply to your email ASAP";

								$from = "Fult1932@armyspy.com";

								mail($email, $subject, $subject, $from);

								echo "<h2 align='center'> Your message has been sent sucessfully </h2>";

							};

						 ?>

					</div> <!--box-header end -->

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