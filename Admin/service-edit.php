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
	include_once "config/db-connect.php";

	if (isset($_GET['id'])) 
	{
		$id = mysqli_real_escape_string($conn,$_GET['id']);

		$sql = "SELECT * FROM service WHERE id=$id";

		$result = mysqli_query($conn,$sql);
		$service=mysqli_fetch_assoc($result);
		
		mysqli_close($conn);
	}

?>	
<!-- service section -->
	<h2 class="text-center">Edit Services</h2>
	<div class="container">	
		<form method="post" action = "service-update.php" enctype="multipart/form-data" style="width: 300px;">
	 		<input type="hidden" name="id" value="<?php echo $service['id'] ?>">
	 		
	 		<label for = "name" class="text-dark font-size-16 font-rb">Services:</label>
	 		<!-- <textarea name="name" id="name" class="form-control" value="<?php echo $service['name']; ?>"></textarea><br> -->
	 		<input type="text" name="name" id="name" class="form-control" value="<?php echo $service['name']; ?>"><br><br>
	 		<!-- <select name="id" id="services">
	 			<?php 
	 				$service = mysqli_fetch_assoc($sql);
	 				$sql = mysqli_query($conn, "SELECT * FROM services");

	 				while ($cat = mysqli_fetch_assoc($sql)) 
	 					{?>
	 					
	 					<option value="<?php echo $cat['id'] ?>"
	 						<?php if($cat['id'] == $service['id']) echo "selected" ?> >
	 							<a href="service-edit.php"><?php echo $cat['name'];?> </a>
	 					</option>
	 				<?php } ?>
	 		</select><br><br> -->

	 		<input type="submit" name = "submit" value="Update Services" class="btn btn-info mr-3">
	 		<a href="service-list.php" class="btn btn-info">Back</a>

		</form>
	</div>
<!-- service section end -->

 <script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>