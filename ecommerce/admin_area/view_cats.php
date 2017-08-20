<table width="795" align="center" bgcolor="pink">
	<tr align="center">
	<td colspan="6"><h2>View All categories Here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
		
		<th>Edit</th>
		<th>Delete</th>
	</tr>
<?php
include("includes/db.php");

$get_cats="select * from categories";
$run_cats=mysqli_query($con,$get_cats);
$i=0;
while($row_cats=mysqli_fetch_array($run_cats))
{	
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];
	
	$i++;


?>




	<tr align="center">
		<td><?php echo $i;   ?></td>
		<td><?php echo $cat_title;   ?></td>
		
		<td><a href="index.php?edit_cat=<?php  echo $cat_id; ?>">Edit</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php  echo $cat_id; ?>">Delete</a></td>

	</tr>



<?php   }  ?>

</table>