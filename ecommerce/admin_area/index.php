<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an admin!','_self')</script>";

}
else{


?>

<!DOCTYPE>
<html>
	<head>
		<title>This is admin panel</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
	</head>

	<body bgcolor="skyblue">
	<div class="main_wrapper">
		<div id="header">
		

			<div id="right">
				<h2 style="text-align: center;">Manage Content</h2><br>
				<a href="index.php?insert_product">Insert Product</a>
				<a href="index.php?view_product">View All Product</a>
				<a href="index.php?insert_cat">Insert New Category</a>
				<a href="index.php?view_cats">View All Categories</a>
				<a href="index.php?insert_brand">Insert New Brand</a>
				<a href="index.php?view_brands">View All Brand</a>
				<a href="index.php?view_customers">View Customer</a>
				<a href="index.php?view_orders">View Orders</a>
				<a href="index.php?view_payments">View Payment</a>
				<a href="logout.php">Admin log-out</a>
				
					
				

			</div>
			<div id="left">
				<?php
				if (isset($_GET['insert_product'])) {
					include("insert_product.php");
				}
				if (isset($_GET['view_product'])) {
					include("view_product.php");
				}
				if (isset($_GET['edit_pro'])) {
					include("edit_pro.php");
				}
				if (isset($_GET['insert_cat'])) {
					include("insert_cat.php");
				} 
				if (isset($_GET['view_cats'])) {
					include("view_cats.php");
				}
				if (isset($_GET['edit_cat'])) {
					include("edit_cat.php");
				}
				if (isset($_GET['insert_brand'])) {
					include("insert_brand.php");
				}
				if (isset($_GET['view_brands'])) {
					include("view_brands.php");
				}
				if (isset($_GET['edit_brand'])) {
					include("edit_brand.php");
				}
				if (isset($_GET['view_customers'])) {
					include("view_customers.php");
				}
				
				?>
			</div>
			
		</div>
		
	</div>

		
	</body>
</html>


<?php

}

?>