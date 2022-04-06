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
						Shop
					</li>
				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->

			<div class="col-md-3"> <!--col-md-3 Begin -->
				
				<?php

					include("includes/sidebar.php")
				?>

			</div> <!--col-md-3 End -->

			<div class="col-md-9"> <!--col-md-9 Begin -->
						
				<div class='box'> <!--box Begin -->
							
					<h1>Shop</h1>

					<p>
						Flowers Delivered Fresh To Your Inbox.
					</p>

				</div> <!--box End -->


				<div id="products" class="row"> <!--row Begin -->

					<?php 

						getProducts(); 

					 ?>

				</div> <!--row End -->

				<center>
					<ul class="pagination"> <!--pagination Begin-->

						<?php 

						getPaginator(); 

					 ?>						

					</ul> <!--pagination End -->
				</center>
					 
			</div> <!--col-md-9 End -->

			<div id="wait" style="position: absolute;top: 40%;left: 42%;padding: 200px 100px 100px 100px;"></div>

		</div> <!--container End -->
	</div> <!--content End -->





	<?php
		include("includes/footer.php");
	?>


<!-- JQUERY  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
	
	$(document).ready(function(){

		// Hide and show sidebar Toggle //

		$('.nav-toggle').click(function(){

			$('.panel-collapse,.collapse-data').slideToggle(800, function(){

				if ($(this).css('display')=='none') {

					$(".hide-show").html('Show');

				} else {

					$(".hide-show").html('Hide');

				}

			});

		});

		// Finish Hide and show sidebar Toggle //

		// Search Filters | By Letter //

		$(function(){

			$.fn.extend({

				filterTable: function(){

					return this.each(function(){

						$(this).on('keyup', function(){

							var $this = $(this),
							search = $this.val().toLowerCase(),
							target = $this.attr('data-filters'),
							handle = $(target),
							rows = handle.find('li a');

							if (search == '') {

								rows.show();

							} else {

								rows.each(function(){

									var $this = $(this);

									$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : this.show();

								});

							}

						});

					});

				}

			});

			$('[data-action="filter"][id="dev-table-filter"]').filterTable();

		});

		// Search Filters | By Letter //

	});

</script>

<script>
	
	$(document).ready(function(){

		// Get Products Function Begin

		function getProducts(){

			// Code for Manufacturers Begin

			var sPath = '';
			var aInputs = $('li').find('.get_manufacturer');
			var aKeys = Array();
			var aValues = Array();

			iKey = 0;

			$.each(aInputs, function(key, oInput){ 

				if (oInput.checked) {

					aKeys[iKey] = oInput.value

				};

				iKey++;

			});

			if (aKeys.length>0) {
				var sPath = '';

				for (var i = 0; i < aKeys.length; i++) {
					
					sPath = sPath + 'man[]=' + aKeys[i]+'&';

				}
			}

		// Code for Manufacturers End

		// Code for category Begin

			var aInputs = Array();
			var aInputs = $('li').find('.get_category');
			var aKeys = Array();
			var aValues = Array();

			iKey = 0;

			$.each(aInputs, function(key, oInput){ 

				if (oInput.checked) {

					aKeys[iKey] = oInput.value

				};

				iKey++;

			});

			if (aKeys.length>0) {
				var sPath = '';

				for (var i = 0; i < aKeys.length; i++) {
					
					sPath = sPath + 'cat[]=' + aKeys[i]+'&';

				}
			}

		// Code for  Category End

		// Code for Product category Begin

			var aInputs = Array();
			var aInputs = $('li').find('.get_p_category');
			var aKeys = Array();
			var aValues = Array();

			iKey = 0;

			$.each(aInputs, function(key, oInput){ 

				if (oInput.checked) {

					aKeys[iKey] = oInput.value

				};

				iKey++;

			});

			if (aKeys.length>0) {
				var sPath = '';

				for (var i = 0; i < aKeys.length; i++) {
					
					sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

				}
			}

		// Code for Product Category End


		// Code for Loader Begin


		$('#wait').html('<img src="images/load.gif"');

		// Code for Loader End

		$.ajax({

			url:"load.php",
			method:"POST",

			data: sPath+'sAction=getProducts',

			success:function(data){

				$('#products').html('');
				$('#products').html(data);
				$('#wait').empty();
			}

		});

		$.ajax({

			url:"load.php",
			method:"POST",

			data: sPath+'sAction=getPaginator',

			success:function(data){

				$('.pagination').html('');
				$('.pagination').html(data);
			}
			
		});

		}

		// Get Products Function End

		$('.get_manufacturer').click(function(){

			getProducts();

		});

		$('.get_p_category').click(function(){

			getProducts();

		});

		$('.get_category').click(function(){

			getProducts();

		});

	});

</script>


</body>
</html>