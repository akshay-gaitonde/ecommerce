<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
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
						<span style="float:right;font-size:18px;padding:5px;line-height:5px;">welcome!
						<b style="color:yellow;"> shopping cart-</b> total item: <?php total_items(); ?> total price:<?php total_price();?> <a href="cart.php">goto cart</a> 
						
						</span>
					
					</div>

					<div>

					<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<table align="center" width="750">
						<tr >
							<td colspan="4" align="center">
								<h2>Create an Account</h2>
							</td>
						</tr>
						
						<tr>
						<td align="right">customer name:</td>
						<td><input type="text" name="c_name" required></td>
						</tr>


						<tr>
						<td align="right">customer email:</td>
						<td><input type="text" name="c_email" required></td>
						</tr>


						<tr>
						<td align="right">customer password:</td>
						<td><input type="password" name="c_pass" required></td>
						</tr>

						<tr>
						<td align="right">customer Image:</td>
						<td><input type="file" name="c_image" ></td>
						</tr>

						<tr>
						<td align="right">customer country:</td>
						<td>
							<select name="c_country" >
								<option>select a country</option>
								<option>United States</option>
								<option>United Kingdom</option>
								
								<option>India</option>
								<option>Pakistan</option>
								
								
								
								 
								<option>Srilanka</option>
								
							</select>
						</td>
						</tr>

						<tr>
						<td align="right"> customer city:</td>
						<td><input type="text" name="c_city" required></td>
						</tr>


						<tr>
						<td align="right">customer contact:</td>
						<td><input type="text" name="c_contact" required></td>
						</tr>


						<tr>
						<td align="right">customer adderss</td>
						<td><input type="text" name="c_adderss" required></td>
						</tr>

						<tr>
							<td colspan="4" align="center"><input type="submit" name="register" value="Create Account"></td>
						</tr>


					</table>


					</form>
				
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


	<?php
	if(isset($_POST['register']))
	{
		global $con;
		$ip=getIp();
		$c_name= $_POST['c_name'];
		$c_email= $_POST['c_email'];
		$c_pass= $_POST['c_pass'];
		$c_image= $_FILES['c_image']['name'];
		$c_image_tmp= $_FILES['c_image']['tmp_name'];
		$c_country= $_POST['c_country'];
		$c_city= $_POST['c_city'];
		$c_contact= $_POST['c_contact'];
		$c_adderss= $_POST['c_adderss'];

		move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

		 $insert_c= "insert into customer (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_adderss','$c_image')";


		 $run_c = mysqli_query($con,$insert_c);

		 

		 $sel_cart="select * from cart where ip_add='$ip'";
		 $run_cart=mysqli_query($con,$sel_cart);

		 $check_cart= mysqli_num_rows($run_cart);

		 if($check_cart==0)
		 {
		 	$_SESSION['customer_email']=$c_email;

		 	echo "<script>alert('Account has been created successfully, thanks')</script>";
		 	echo "<script>window.open('customer/my_account.php','_self')</script>";
		 }
		 else
		 {
		 $_SESSION['customer_email']=$c_email;

		 	echo "<script>alert('Account has been created successfully, thanks')</script>";
		 	echo "<script>window.open('checkout.php','_self')</script>";	
		 }


	}



	?>