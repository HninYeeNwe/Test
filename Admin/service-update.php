<?php 	
	include_once "config/db-connect.php";
	
		$id = $_POST['id'];
		$name = $_POST['name'];
		
		$sql = "UPDATE services SET name = '$name' WHERE id = $id";

		mysqli_query($conn,$sql);
		header("location: service-list.php");


	// if (mysqli_query($conn,$sql)) {
	// 		header("location:service-list.php");
	// 	}else{
	// 		echo "query error:".mysqli_error($conn);
	// 	}
		
	// }
 ?>

