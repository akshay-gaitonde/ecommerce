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
						<span style="float:right;font-size:18px;padding:5px;line-height:5px;">welcome!
						<b style="color:yellow;"> shopping cart-</b> total item: <?php total_items(); ?> total price:<?php total_price();?> <a href="index.php">Back to Shop</a> 
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
						<form action="" method="post" enctype="multipart/form-data">
						<table align="center" width="700" bgcolor="skyblue">
						<tr align="center">
							<td colspan="5"><h2>Update your cart</h2></td>
						</tr>
						<tr align="center">
							<th>Remove</th>
							<th>Product(s)</th>
							<th>Quantity</th>
							<th>Total Price</th>
						</tr>
						<?php
						$total=0;
						global $con;
						$ip=getIp();
						$sel_price="select * from cart where ip_add='$ip'";
						$run_price=mysqli_query($con,$sel_price);
						while($p_price=mysqli_fetch_array($run_price))
						{
							$pro_id=$p_price['p_id'];
							$pro_price="select * from products where product_id='$pro_id'";
							$run_pro_price=mysqli_query($con,$pro_price);
							while($pp_price=mysqli_fetch_array($run_pro_price))
							{
							$product_price=array($pp_price['product_price']);

							$product_title=$pp_price['product_title'];
							$product_image=$pp_price['product_image'];
							$single_price=$pp_price['product_price'];

							$values= array_sum($product_price);
							$total += $values;
							
						
						


						?>
						<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>" /></td>
						<td> <?php echo $product_title;   ?><br>
						<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"></td>
						<td><input type="text" name="qty" size="4" value="1"  ></td>
						<?php

						if(isset($_POST['update_cart']))
						{
							$qty = $_POST['qty'];
							$update_qty = "update cart set qty='$qty'";
							$run_qty=mysqli_query($con,$update_qty);

							$_SESSION['qty'] = $qty;

							$total = $total * $qty;
						}
						?>

						<td><?php echo "Rs. ".$single_price; ?>	</td>
						</tr>

						
						<?php } } ?>
						<tr align="right">
							<td colspan="5"><b>Sub Total:</b></td>
							<td><?php echo "Rs. " .$total; ?></td>
						</tr>
						<tr align="center">
							<td><input type="submit" name="update_cart" value="update cart"/></td>
							<td><input type="submit" name="continue" value="continue shopping"></td>
							<td><button><a href="checkout.php" style="text-decoration: none; color: black">checkout</a></button></td>
						</tr>



						</table>
						</form>
						<?php
						global $con;
						$ip = getIp();
						if(isset($_POST['update_cart']))
						{
							if($_POST['remove']){
							foreach($_POST['remove'] as $remove_id)
							{
								$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";

								$run_delete = mysqli_query($con, $delete_product);
								if($run_delete){echo "<script>window.open('cart.php','_self')</script>";}
							}
						}}
						if(isset($_POST['continue']))
						{echo "<script>window.open('index.php','_self')</script>";}
				

				

					?>
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