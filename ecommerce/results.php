<!DOCTYPE>
<?php
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
					if(isset($_GET['search'])){
						$search_query = $_GET['user_query'];
					$get_pro = "select * from products where product_keyword LIKE '%$search_query%'";
						$run_pro = mysqli_query($con, $get_pro);
						$count_pro=mysqli_num_rows($run_pro);
						if($count_pro==0){echo"<h2>result not found</h2>";}
	
						while($row_pro=mysqli_fetch_array($run_pro))
						{
							$pro_id= $row_pro['product_id'];
							$pro_cat= $row_pro['product_cat'];
							$pro_brand= $row_pro['product_brand'];
							$pro_title= $row_pro['product_title'];
							$pro_price= $row_pro['product_price'];
							$pro_image= $row_pro['product_image'];
		
							echo "
									<div id='single_product'>
									<h3>$pro_title</h3>
									<img src='admin_area/product_images/$pro_image' width='180' height='180' />
									<p><b>RS. $pro_price</b></p>
			
									<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
									<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
									</div>
								";
		
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