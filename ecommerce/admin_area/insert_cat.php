<form action="" method="POST" style="padding: 100px;">
<b>Insert new category:</b>
<input type="text" name="new_cat" required>
<input type="submit" name="add_cat" value="add category">
</form>

<?php
include("includes/db.php");
if (isset($_POST['add_cat'])) {

$new_cat=$_POST['new_cat'];
$insert_cat="insert into categories (cat_title) values ('$new_cat')";

$run_cat=mysqli_query($con,$insert_cat);
		if($run_cat)
		{
			 
			echo "<script>alert('New category has been added')</script>"; 
			echo "<script>window.open('index.php?insert_cat','_self')</script>";			
		}


}



?>