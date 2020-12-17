<?php 
	include_once "config/db-connect.php";
	// adding new Visitor
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
	// testing
	// $visitor_ip = "50:50:50";

	// checking if visitor is array_unique
	$query = "SELECT * FROM counter WHERE ip_address = '$visitor_ip'";
	$result = mysqli_query($conn,$query);

	if (!$result) {
		die("Retriving query error<br>".$query);
	}
	$total_visitors = mysqli_num_rows($result);

	if ($total_visitors < 1) {
		$query = "INSERT INTO counter(ip_address) VALUES ('$visitor_ip')";
		$result = mysqli_query($conn,$query);
	}

 ?>

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
<?php 
	include_once "config/db-connect.php";

	$sql = "SELECT * FROM clients ORDER BY created_date DESC";

	$result = mysqli_query($conn,$sql);

	$clients = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// print_r($book);
	mysqli_free_result($result);

	mysqli_close($conn);
 ?>


<!-- navbar section -->
	<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
	  	<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#myNavbar">
	    <span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="myNavbar">
		  	<div class="container-fluid">
		  		<div class="row">
		  			<div class="col-xl-3 col-lg-4 sidebar fixed-top">
		  				<div class="admin-info border-bottom py-3 mt-2">
		  					<a class="navbar-brand text-white mb-4 border-bottom d-block text-center" href="#">HSP Digital Marketing Agency</a>

		  					<ul class="navbar-nav flex-column">
		  						<li class="nav-item my-2">
		  							<a href="client-list.php" class="nav-link text-white text-center current">သုံးစွဲသူများ</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="service-list.php" class="nav-link text-white text-center sidebar-link">ဝန်ဆောင်မှုများ</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="report.php" class="nav-link text-white text-center sidebar-link">Monthly Clients</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="logout.php" class="nav-link text-white text-center sidebar-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
		  						</li>
		  					</ul>
		  				</div>
		  			</div>

		  			<div class="col-xl-9 col-lg-8 bg-light fixed-top ml-auto top-navbar">
		  				<div class="row">
		  					<div class="col-lg-10">
		  					</div>
		  					<div class="col-lg-2 mt-2">
		  						<h5 class="text-white">Visitors</h5>
		  						
								<h6 class="text-white"><i class="fas fa-chart-line text-white mr-3"></i><?php echo $total_visitors; ?></h6>
		  					</div>
		  				</div>
		  			</div>
		  			
		  		</div>
		  	</div>
		</div>
	</nav>
<!-- navbar section end -->

<!-- client section start -->
	<section id="client">
		<div class="row mt-lg-5">
			<div class="col-xl-9 col-lg-8 ml-auto">
				<div class="container-fluid p-3 mb-5">
					<div class="row">
						<div class="col-md-10">
							<h3 class="text-center my-5 client">သုံးစွဲသူများ စာရင်း</h3>
						</div>
						<div class="col-md-2 mt-5">
							<a class="btn btn-info btn-small text-white" href="client-new.php">Add New Client</a>
						</div>
					</div>
						
					<div class="row my-5">
						<?php 
							foreach ($clients as $client) {?>

							<div class="col-sm-6 col-md-3 mb-5">
								<div class="client-top">
									<img src="../images/<?php echo $client['cimage']; ?>" class="img-fluid" alt="">
								</div>
								<div class="client-bottom mt-3 text-center">
									<h5 class="mt-4 font-size-16 font-rb"><?php echo $client['cname']; ?></h5>
								</div>

								<form action="client-del.php" method="post" class="align-center d-flex">
									<input type="hidden" name="id_to_delete" value="<?php echo $client['cid'] ?>"> 
									<input type="submit" name="delete" value="Delete" class="btn btn-primary text-white mr-3">
									<a href="client-edit.php?id=<?php echo $client['cid']; ?>" class = "btn btn-info text-white font-size-16 font-rb">edit</a>
								</form>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- client section end -->

<!-- footer section start -->
<div class="row mt-lg-5">
			<div class="col-xl-9 col-lg-8 ml-auto">
	<footer class="text-muted mt-5 text-center">
		copyright &copy; <?php echo date("Y"); ?> HSP Digital Marketing Agency Co., ltd. All right reserved.		
	</footer>
</div></div>
<!-- footer section end -->


  
 
	<script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>