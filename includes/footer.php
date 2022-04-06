<div id="footer"> <!--#footer Begin -->
	
	<div class="container"> <!--container Begin -->

		<div class="row"> <!--row Begin -->

			<div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Begin -->

				<h4>Pages</h4>

				<ul> <!--ul Begin -->
					
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>

				</ul> <!--ul end -->

				<hr>

				<h4>User Section</h4>

				<ul> <!--ul Begin -->

					<li>

						<?php 

							if (!isset($_SESSION['customer_email'])) {
									
								echo "<a href='checkout.php'>Login</a>";

							} else {

								echo "<a href='customer/my_account.php?my_orders'> My Account</a>";

							}

						?>

					</li>	

					<li><a href="../customer_register.php">Register</a></li>
					<li><a href="terms.php">Terms and Conditions</a></li>

				</ul> <!--ul end -->

				<hr class="hidden-md hidden-lg hidden-sm">			


			</div> <!--col-sm-6 col-md-3 end -->

			<div class="find col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 	Begin -->

				<h4>Find Us</h4>

				<p> <!--p Begin -->
					
					<strong>Keski Limited</strong>
					<br />Kenol
					<br />Kenya
					<br />0722161840
					<br />keskilimited@gmail.com
					<br /><strong>KESKI</strong>

				</p> <!--p end -->

				<a href="contact.php">Check Our Contact Page</a>

				<hr class="hidden-md hidden-lg">				

			</div> <!--col-sm-6 col-md-3 end -->

			<div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Begin -->

				<h4>Categories</h4>

				<ul> <!--ul Begin -->
					
					<?php 

						$get_p_cats = "select * from product_categories";

						$run_p_cats = mysqli_query($con, $get_p_cats);

						while($row_p_cats=mysqli_fetch_array($run_p_cats)){

							$p_cat_id = $row_p_cats['p_cat_id'];

							$p_cat_title = $row_p_cats['p_cat_title'];

							echo "

								<li>

									<a href='shop.php?p_cat=$p_cat_id'>

										$p_cat_title

									</a>

								</li>

							";
						}

					 ?>

				</ul> <!--ul end -->

				<hr class="hidden-md hidden-lg">


				<hr class="hidden-md hidden-lg hidden-sm">			


			</div> <!--col-sm-6 col-md-3 end -->


			<div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 	Begin -->

				<h4>Get The  News</h4>

				<p style="color: #ffffff;" class="text-muted">
					
					Don't miss our latest Update. Subscribe!

				</p>

				<form action="get" method="post"> <!--form Begin -->
					
					<div class="input-group"> <!--input-group Begin -->
						
						<input type="text" class="form-control" name="email">

						<span class="input-group-btn"> <!--input-group-btn Begin -->
							
							<input type="submit" value="subscribe" class="btn"></input>

						</span> <!--input-group-btn end -->

					</div> <!--input-group end -->

				</form> <!--form end -->

				<hr>

				<h4>Keep In Touch</h4>

				<p class="social">
					
					<a href="#" class="fab fa-facebook-f"></a>
					<a href="#" class="fab fa-twitter"></a>
					<a href="#" class="fab fa-linkedin-in"></a>
					<a href="#" class="fab fa-instagram"></a>


				</p>			

			</div> <!--col-sm-6 col-md-3 end -->		


		</div> <!--row end -->

	</div> <!--container end -->

</div> <!--#footer End -->


<div id="copyright"> <!--#copyright Begin -->
	
	<div class="container"> <!--container Begin -->
		
		<div class="col-md-12"> <!--col-md-6 Begin-->

			<p><p id="copyright-year">2021<p/> Keskiltd All Rights Reserved</p>

		</div> <!--col-md-6 End -->

	</div> <!--container End -->

</div> <!--copyright End -->

<script>
    document.querySelector('#copyright-year').innerText = new Date().getFullYear();
</script>














			