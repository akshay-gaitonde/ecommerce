<form action="" method="POST" style="padding: 100px;">
<b>Insert new Brand:</b>
<input type="text" name="new_brand" required>
<input type="submit" name="add_brand" value="add brand">
</form>

<?php
include("includes/db.php");
if (isset($_POST['add_brand'])) {

$new_brand=$_POST['new_brand'];
$insert_brand="insert into brands (brand_title) values ('$new_brand')";

$run_brand=mysqli_query($con,$insert_brand);
		if($run_brand)
		{
			 
			echo "<script>alert('New Brand has been added')</script>"; 
			echo "<script>window.open('index.php?insert_brand','_self')</script>";			
		}
		


}



?>