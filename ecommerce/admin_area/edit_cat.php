<?php
include("includes/db.php");

if (isset($_GET['edit_cat'])) {
	$cat_id=$_GET['edit_cat'];
	$get_cat="select *from categories where cat_id='$cat_id'";
	$run_cat=mysqli_query($con,$get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$cat_title=$row_cat['cat_title'];

}


?>



<form action="" method="POST" style="padding: 100px;">
<b>current category:</b>
<input type="text" name="cat" value="<?php echo "$cat_title";  ?>"><br/>
<b>change actegory title:</b><input type="text" name="new_cat" required><br/>
<input type="submit" name="update_cat" value="update category">
</form>

<?php

if (isset($_POST['update_cat'])) {

$update_id=$cat_id;
$new_title=$_POST['new_cat'];
$update_cat="update categories set cat_title='$new_title' where cat_id='$update_id'";

$run_cat=mysqli_query($con,$update_cat);
		if($run_cat)
		{
			 
			echo "<script>alert('New category has been updated')</script>"; 
			echo "<script>window.open('index.php?view_cats','_self')</script>";			
		}


}



?>