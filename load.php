<?php 
	
	session_start();

	include("includes/db.php");
	include("functions/functions.php");

	switch ($_REQUEST['sAction']) {

		case'getPaginator':

			getPaginator();

			break;

		default:

			getProducts();
				
			break;

	}

 ?>