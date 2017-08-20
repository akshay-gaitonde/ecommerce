<!DOCTYPE>
<?php
include("functions/functions.php");

?>
<html>
	<head>
		<title>shop_cart</title>
		
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
				
					<input type="text" name="user_query" placeholder="search product"  />
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
					<div id="shopping_cart">
						<span style="float:right;font-size:18px;padding:5px;line-height:5px;">welcome!
						<b style="color:yellow;"> shopping cart-</b> total item:<?php total_items(); ?> total price:<?php total_price();?> <a href="cart.php">goto cart</a>
						
						</span>
					
					</div>
					<div id="products_box" >
					<?php
					if(isset($_GET['pro_id']))
					{
						
					$product_id=$_GET['pro_id'];
						$get_pro = "select * from products where product_id='$product_id' ";
						$run_pro = mysqli_query($con, $get_pro);
	
						while($row_pro=mysqli_fetch_array($run_pro))
							{
								$pro_id= $row_pro['product_id'];
								$pro_desc= $row_pro['product_desc'];
								$pro_title= $row_pro['product_title'];
								$pro_price= $row_pro['product_price'];
								$pro_image= $row_pro['product_image'];
		
								echo " <div id='single_product'>
										<h3>$pro_title</h3>
										<img src='admin_area/product_images/$pro_image' width='400' height='300' />
										<p>$pro_desc</p>
										<p><b>RS. $pro_price</b></p>
			
										<a href='index.php' style='float:left'>Go Back</a>
										<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
										</div>";
		
							}

					}
	?>
					</div>
				</div>
		</div>
		<!--Content Block ends here-->

		<!--Footer starts here-->
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy;copyright@shop-cart</h2>
		</div>
		<div> </div>
		<!--Footer ends here-->
	
	</div>
	<!--Main Container ends here-->

	</body>
	</html>