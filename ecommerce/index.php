<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>shop-cart</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all" />  
	</head >
	
<body>
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<!--Header starts here-->
		<div class="header_wrapper">
		<img src="images/logo-shop-cart.png" style="padding-top: 50px;">
		<div></div>
		</div>
		<!--Header ends here-->
		
		<!--Navigation bar starts here-->
		<div class="menu_bar">
			
			
			
			<div id="menu">
			<ul >
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
			
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
			</div>
			<div id="search">
				<form method="get" action="results.php" enctype="multipart/form-data">
				
					<input type="text" name="user_query" placeholder=" search product"  />
					<input type="submit" name="search" value="search"  />
				</form>
			</div>	
			 
		</div>
		<div> </div>
		<!--Navigation bar ends here-->

		<!--Content Block starts here-->
		<div class="content_wrapper">
				<div id="sidebar">
					<div id="sidebar_title">Categories</div>
					<ul id="cats" >
						<?php getCats(); ?>
					</ul>
					<div id="sidebar_title">Brands</div>
					<ul id="cats">
						<?php getBrands(); ?>
					</ul>
				
				</div>
				<div id="content_area">
				<?php cart();?>
					<div id="shopping_cart">
						<span style="float:right;font-size:18px;padding:5px;line-height:5px;">
						<?php
						if(isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome: </b>". $_SESSION['customer_email'] ."<b style='color:yellow;'>Your</b>";
						}
						else
						{
							echo "<b>welcome Guest</b>";
						}




						?>
						
						

						<b style="color:yellow;"> shopping cart-</b> total item: <?php total_items(); ?> total price:<?php total_price();?> <a href="cart.php">goto cart</a>

						<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php'>Login</a>";
						}
						else
						{
							echo "<a href='logout.php'>Logout</a>";

						}

						?>


						
						</span>
					
					</div>

					<div id="products_box" >
					<?php getPro(); ?>
					<?php getCat_Pro(); ?>
					<?php getBrand_Pro();?>
					</div>
				</div>
		</div>
		<!--Content Block ends here-->

		<!--Footer starts here-->
		<div id="footer">
		&copy; 2017. <a href="index.php">shop-cart</a>
		</div>
	
	</div>
	<!--Main Container ends here-->

	</body>
	</html>