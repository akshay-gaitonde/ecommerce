<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
if(!isset($_SESSION['customer_email']))
						{
							echo "<script>window.open('../checkout.php','_self')</script>";
						}

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
		<img src="../images/logo-shop-cart.png" style="padding-top: 50px;">
		<div></div>
		</div>
		<!--Header ends here-->
		
		<!--Navigation bar starts here-->
		<div class="menu_bar">
			
			
			
			<div id="menu">
			<ul >
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				
				<li><a href="../cart.php">Shopping Cart</a></li>
				<li><a href="../contact.php">Contact Us</a></li>
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
					<div id="sidebar_title">My Account</div>
					<ul id="cats" >
					<?php
					$user = $_SESSION['customer_email'];
					$get_img = "select * from  customer where customer_email='$user'";
					$run_img = mysqli_query($con,$get_img);
					$row_img = mysqli_fetch_array($run_img);
					$c_image = $row_img['customer_image'];

					$c_name = $row_img['customer_name'];

					echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";



					?>


						<li><a href="my_account.php?my_orders">My Orders</a></li>
						<li><a href="my_account.php?edit_account">Edit Account</a></li>
						<li><a href="my_account.php?change_pass">Change Password </a></li>
						<li><a href="my_account.php?delete_account">Delete Account</a></li>
						<li><a href="../logout.php">Log-out</a></li>



					</ul>
					
				
				</div>
				<div id="content_area">
				<?php cart();?>
					<div id="shopping_cart">
						<span style="float:right;font-size:18px;padding:5px;line-height:5px;">
						<?php
						if(isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome: </b>". $_SESSION['customer_email'] ;
						}
						
						?>
						
						


						<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='../checkout.php'>Login</a>";
						}
						else
						{
							echo "<a href='../logout.php'>Logout</a>";

						}

						?>


						
						</span>
					
					</div>

					<div id="products_box" >

					
					<?php
					if (!isset($_GET['my_orders'])) {
						if (!isset($_GET['edit_account'])) {
							if (!isset($_GET['change_pass'])) {
								if (!isset($_GET['delete_account'])) {
					
					echo "<h2> welcome: $c_name  </h2><br>";
					echo "<b>You can see orders progress <a href='my_account.php?my_orders'> here</a></b>";
					}}}}
					?>

					<?php
					if (isset($_GET['edit_account'])) 
					{
						include("edit_account.php");
					}

					if (isset($_GET['change_pass'])) 
					{
						include("change_pass.php");
					}

					if (isset($_GET['delete_account'])) 
					{
						include("delete_account.php");
					}

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