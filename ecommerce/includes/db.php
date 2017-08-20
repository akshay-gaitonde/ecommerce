<?php

$con = mysqli_connect("localhost","root","","onkart");

if(mysqli_connect_errno())
{
	echo "failed to connet to mysql:".mysqli_connect_error();
}

?>    