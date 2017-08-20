<table width="795" align="center" bgcolor="pink">
	<tr align="center">
	<td colspan="6"><h2>View All Brands Here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
		
		<th>Edit</th>
		<th>Delete</th>
	</tr>
<?php
include("includes/db.php");

$get_brands="select * from brands";
$run_brands=mysqli_query($con,$get_brands);
$i=0;
while($row_brands=mysqli_fetch_array($run_brands))
{	
	$brand_id=$row_brands['brand_id'];
	$brand_title=$row_brands['brand_title'];
	
	$i++;


?>




	<tr align="center">
		<td><?php echo $i;   ?></td>
		<td><?php echo $brand_title;   ?></td>
		
		<td><a href="index.php?edit_brand=<?php  echo $brand_id; ?>">Edit</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php  echo $brand_id; ?>">Delete</a></td>

	</tr>



<?php   }  ?>

</table>