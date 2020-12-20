<!DOCTYPE html>
<html lang="en">
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

<!-- client-new section start -->
	<!-- <h2 class ="header text-center">Add New Client</h2>
	<div class="container">

		<form action="client-new.php" method="post" enctype="multipart/form-data"style="width: 500px;" class="mx-auto">
			<label for = "cname" class="text-dark font-size-16 font-rb">Choose Images:</label><br>
			<input type="file" name="images[]" multiple/> -->
 			<!-- <select name="category" id="categories" class="form-control">
	 			<option value="1">Add 1 image</option>
	 			<option value="2">Add 2 image</option>
	 			<option value="3">Add 3 image</option>
				<option value="4">Add 4 image</option>
				<option value="5">Add 5 image</option>
			</select><br> -->
		<!-- </form> -->

		<form method="post" action = "client-add.php" enctype="multipart/form-data" style="width: 300px;" class="mx-auto">
			<h2 class="text-center my-5">Add New Clients</h2>

			<div class="form-group">
				<label for = "cname" class ="text-dark font-size-16 font-rb">Client Name:</label>
				<input type="text" name="cname" id="cname" class="form-control"><br>
			</div>

			<div class="form-group">
				<label for = "cname" class="text-dark font-size-16 font-rb">Choose Cover Image:</label>
				<input type="file" name="cimage" id="cimage"><br><br>
			</div>

			<input type="file" name="images[]" multiple/>

			<input type="submit" name="submit" class="btn btn-info mt-5 font-size-16 font-rb mr-3" value="Add Client">
			<a href="client-list.php" class="btn btn-info mt-5">Back</a>
		</form>
	</div>


	<script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>

