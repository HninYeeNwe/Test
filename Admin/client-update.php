<?php 	
	include_once "config/db-connect.php";

	// $id = '';
	$id = $_POST['id'];
	$name = $_POST['cname'];
	$image = $_FILES['cimage']['name'];
	$tmp = $_FILES['cimage']['tmp_name'];

	if ($image) {
		move_uploaded_file($tmp,"../images/$image");

		$sql = "UPDATE clients SET cname = '$name',cimage='$image' WHERE cid = $id";
	
	}else{
		$sql = "UPDATE clients SET cname = '$name' WHERE cid = $id";
	}
	mysqli_query($conn,$sql);
		
	header("location: client-list.php");
 ?>

