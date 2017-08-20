<h2 style="text-align: center;"> Delete account</h2>
<form action="" method="post">
<br>
<h4 style="text-align: cenetr"> do you really want to delete the account ?</h4><br>
<input type="submit" name="yes" value="Yes delete account">
<input type="submit" name="no" value="NO, dont delete">

	
</form>
<?php
include("includes/db.php");


$user=$_SESSION['customer_email'];

if(isset($_POST['yes']))
{
	$delete_customer="delete from customer where customer_email='$user'";
	$run_customer= mysqli_query($con,$delete_customer);

	echo "<script>alert('Sorry, Your account has been deleted')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
}
if(isset($_POST['no']))
{
	echo "<script>alert('You had almost deleted the account')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
}


session_destroy();

?>