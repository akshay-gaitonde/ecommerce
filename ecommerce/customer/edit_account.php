					<?php
					include("includes/db.php");
					$user = $_SESSION['customer_email'];
					$get_customer = "select * from  customer where customer_email='$user'";
					$run_customer = mysqli_query($con,$get_customer);
					$row_customer = mysqli_fetch_array($run_customer);

$c_id=$row_customer['customer_id'];

					$name=$row_customer['customer_name'];
					$email=$row_customer['customer_email'];
					$pass=$row_customer['customer_pass'];
					$country=$row_customer['customer_country'];
					$city=$row_customer['customer_city'];
					$contact=$row_customer['customer_contact'];
					$adderss=$row_customer['customer_address'];
					$image=$row_customer['customer_image']
					
					?>
					<form action="" method="post" enctype="multipart/form-data">
					<table align="center" width="750">
						<tr >
							<td colspan="4" align="center">
								<h2>Edit Account</h2>
							</td>
						</tr>
						
						<tr>
						<td align="right">customer name:</td>
						<td><input type="text" name="c_name" value="<?php echo $name;  ?>" required></td>
						</tr>


						<tr>
						<td align="right">customer email:</td>
						<td><input type="text" name="c_email" value="<?php echo $email;  ?>"required></td>
						</tr>


						<tr>
						<td align="right">customer password:</td>
						<td><input type="text" name="c_pass" value="<?php echo $pass;  ?>"required></td>
						</tr>

						<tr>
						<td align="right">customer Image:</td>
						<td><input type="file" name="c_image"   >
						<img src="customer_images/<?php echo $image ?>" width="100" height="100" ></td>
						</tr>

						<tr>
						<td align="right">customer country:</td>
						<td>
							<select name="c_country" disabled="">
								<option><?php  echo "$country"; ?></option>
								<option>United States</option>
								<option>United Kingdom</option>
								
								<option>India</option>
								
																<option>Japan</option>
								
								<option>Srilanka</option>
								
							</select>
						</td>
						</tr>

						<tr>
						<td align="right"> customer city:</td>
						<td><input type="text" name="c_city" value="<?php echo $city;  ?>"required></td>
						</tr>


						<tr>
						<td align="right">customer contact:</td>
						<td><input type="text" name="c_contact" value="<?php echo $contact;  ?>"required></td>
						</tr>


						<tr>
						<td align="right">customer adderss</td>
						<td><input type="text" name="c_adderss" value="<?php echo $adderss;  ?>" required></td>
						</tr>

						<tr>
							<td colspan="4" align="center"><input type="submit" name="update" value="Update Account"></td>
						</tr>


					</table>


					</form>


	<?php
	if(isset($_POST['update']))
	{
		global $con;
		$ip=getIp();

		$customer_id=$c_id;

		$c_name= $_POST['c_name'];
		$c_email= $_POST['c_email'];
		$c_pass= $_POST['c_pass'];
		$c_image= $_FILES['c_image']['name'];
		$c_image_tmp= $_FILES['c_image']['tmp_name'];
		
		$c_city= $_POST['c_city'];
		$c_contact= $_POST['c_contact'];
		$c_adderss= $_POST['c_adderss'];

		move_uploaded_file($c_image_tmp, "customer_images/$c_image");

		 $update_c= "update customer set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_adderss',customer_image='$c_image' where customer_id='$customer_id'; ";


		 $run_update = mysqli_query($con,$update_c);

		 if ($run_update) {
		 	echo "<script>alert('Your Account Successfully updated')</script>";

		 	echo "<script>window.open('my_account.php','_self')</script>";
		 }

		 
	}



	?>