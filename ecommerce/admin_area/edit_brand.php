<?php
include("includes/db.php");

if (isset($_GET['edit_brand'])) {
	$brand_id=$_GET['edit_brand'];
	$get_brand="select * from brands where brand_id='$brand_id'";
	$run_brand=mysqli_query($con,$get_brand);
	$row_brand=mysqli_fetch_array($run_brand);
	$brand_title=$row_brand['brand_title'];

}


?>



<form action="" method="POST" style="padding: 100px;">
<b>current Brand:</b>
<input type="text" name="brand" value="<?php echo "$brand_title";  ?>"><br/>
<b>change brand title:</b><input type="text" name="new_brand" required><br/>
<input type="submit" name="update_brand" value="update brand">
</form>

<?php

if (isset($_POST['update_brand'])) {

$update_id=$brand_id;
$new_title=$_POST['new_brand'];
$update_brand="update brands set brand_title='$new_title' where brand_id='$update_id'";

$run_brand=mysqli_query($con,$update_brand);
		if($run_brand)
		{
			 
			echo "<script>alert('New brand has been updated')</script>"; 
			echo "<script>window.open('index.php?view_brands','_self')</script>";			
		}


}



?>