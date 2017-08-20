<!DOCTYPE>
<?php
	include("includes/db.php");

	if (isset($_GET['edit_pro'])) {
		$getid=$_GET['edit_pro'];
		$get_pro="select * from products where product_id='$getid'";
		$run_pro=mysqli_query($con,$get_pro);

	$row_pro=mysqli_fetch_array($run_pro);
		
	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_image=$row_pro['product_image'];
	$pro_price=$row_pro['product_price'];
	$pro_desc=$row_pro['product_desc'];
	$pro_keyword=$row_pro['product_keyword'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];

	}
?>

<html>
	<head>
		<title>Updating product</title>
	
	

	
	
	
	</head>
	<body bgcolor="sykblue">
	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="800" border="2" bgcolor="blue">
			<tr>
				<td colspan="8" align="center"><h2>Update Product</h2></td>
			</tr>
		
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td> <input type="text" name="product_title" size="60" value="<?php  echo $pro_title;  ?>" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td> 
				<select name="product_cat" >

				<?php  
				$get_pro_cat="select * from categories where cat_id='$pro_cat'";
					$run_pro_cat=mysqli_query($con,$get_pro_cat);					 
					
					$row_pro_cat=mysqli_fetch_array($run_pro_cat);
			$pro_cat_id = $row_pro_cat['cat_id'];
					$pro_cat_title=$row_pro_cat['cat_title']; 
				
					echo "<option value='$pro_cat_id' > $pro_cat_title </option>";
					?>
					<?php
					$get_cats = "select * from categories";
					$run_cats = mysqli_query($con, $get_cats);
	
					while ($row_cats = mysqli_fetch_array($run_cats))
					{
						$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
						echo "<option value='$cat_id'> $cat_title </option>";
					}
					?> 
				</select>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
					<select name="product_brand" >
						
							
					<?php
					$get_pro_brand="select * from brands where brand_id='$pro_brand'";
					$run_pro_brand=mysqli_query($con,$get_pro_brand);					 
					
					$row_pro_brand=mysqli_fetch_array($run_pro_brand);
					$pro_brand_id=$row_pro_brand['brand_id'];
					$pro_brand_title=$row_pro_brand['brand_title'];
					echo "<option value='$pro_brand_id'>$pro_brand_title</option>"; 
					?>
						<?php
							$get_brands = "select * from brands";
							$run_brands = mysqli_query($con, $get_brands);
							while ($row_brands = mysqli_fetch_array($run_brands))
							{
								$brand_id = $row_brands['brand_id'];
								$brand_title = $row_brands['brand_title'];
								echo "<option value='$brand_id'>$brand_title</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td> <input type="file" name="product_image" value="<?php$pro_image?>" /><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"  ></td>
			</tr>
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td> <input type="text" name="product_price" value="<?php echo $pro_price;  ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td> 
				<textarea name="product_desc" cols="30" rows="10" ><?php echo $pro_desc;  ?></textarea>
				</td>
			</tr><tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td> <input type="text" name="product_keywords" value="<?php echo $pro_keyword;   ?>" /></td>
			</tr>
			<tr>
				<td colspan="8" align="center"> 
				<input type="submit" name="update_product" value="Update"  /></td>
			</tr>
			
	</body>
</html>

<?php

	if(isset($_POST['update_product']))
	{
		$update_id=$pro_id;
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$update_product = "update products set  product_cat='$product_cat',product_brand='$product_brand', product_title='$product_title', product_price='$product_price', product_desc='$product_desc', product_image='$product_image', product_keyword='$product_keywords' where product_id='$update_id'";
		$run_product= mysqli_query($con,$update_product);
		if($run_product)
		{
			echo "<script>alert('Product has been updated')</script>"; 
			echo "<script>window.open('index.php?','_self')</script>";			
		}
		else
			{
			echo "<script>alert('Product has  NOT been updated')</script>";
		}
	}
?>