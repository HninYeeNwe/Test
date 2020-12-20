
<?php 
	include_once "config/db-connect.php";

	if (isset($_GET['id'])) 
	{
		$id = mysqli_real_escape_string($conn,$_GET['id']);

		$sql = "SELECT * FROM clients WHERE cid=$id";

		$result = mysqli_query($conn,$sql);
		$client=mysqli_fetch_assoc($result);
		// print_r($result);
		mysqli_free_result($result);
		
		mysqli_close($conn);
	}
		
?>	

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
<!-- service section start-->
	<h2 class="text-center">Edit Client</h2>
	<div class="container">	
		<form method="post" action = "client-update.php" enctype="multipart/form-data" style="width: 250px;">
	 		<input type="hidden" name="id" value="<?php echo $client['cid'] ?>">
	 		
	 		<label for = "cname" class="text-dark font-size-16 font-rb">Client Name:</label>
			<input type="text" name="cname" id="cname" class="form-control" value="<?php echo $client['cname']; ?>"><br>	

			<img src="../images/<?php echo $client['cimage'] ?>" height = "150" name = "cimage"><br>
			<label for="cimage" class="text-dark font-size-16 font-rb">Change Image:</label>

			<input type="file" name="cimage" id="cimage"><br><br>
			<input type="submit" class = "btn btn-info text-white mr-3" name = "edit" value="Update Client">
			<a href="client-list.php" class="btn btn-info">Back</a>
		</form>
	</div>
<!-- service section end -->


 <script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>