<!DOCTYPE html>
<html lang="en" class="row col ml-auto">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>HSP Digital Marketing Agency</title>
	<link rel="stylesheet" href="../library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../library/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="../images/16x16 px - png-logo.png">
</head>
<body>
<?php 
	$conn = mysqli_connect("localhost","root","","hspdb");

	if (!$conn) {
		echo "connection error:".mysqli_connect_error();
	}
?>

<!-- service-new section start -->
	<h2 class ="header text-center">Add New Services</h2>
	<div class="container">
		<form method="post" action = "service-add.php" enctype="multipart/form-data" style="width: 300px;">
			<label for="service">Add Services:</label>
			<textarea name="name" id="name" class="form-control"></textarea><br>
			
			<!-- <label for = "image" class="text-dark font-size-16 font-rb">Choose Image</label> -->
			<!-- <input type="file" name="image" id="image" class="border-none"><br><br> -->
			<input type="submit" class="btn btn-info font-size-16 font-rb mr-3" value="Add Services">
			<a href="service-list.php" class="btn btn-info">Back</a>
		</form>
	</div>
<!-- service-new section end	 -->



	<script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>