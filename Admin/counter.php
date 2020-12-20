
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
<!-- navbar section -->
	<nav class="navbar navbar-expand-lg navbar-light">
	  	<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#myNavbar">
	    <span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="myNavbar">
		  	<div class="container-fluid">
		  		<div class="row">
		  			<div class="col-xl-2 col-lg-3 sidebar fixed-top">
		  				<div class="admin-info border-bottom py-3 mt-5">
		  					<ul class="navbar-nav flex-column">
		  						<li class="nav-item my-2">
		  							<a href="client-list.php" class="nav-link text-white">သုံးစွဲသူများ</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="service-list.php" class="nav-link text-white sidebar-link">ဝန်ဆောင်မှုများ</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="counter.php" class="nav-link text-white sidebar-link current">Visitor Count</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="report.php" class="nav-link text-white sidebar-link">Monthly Clients</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="logout.php" class="nav-link text-white sidebar-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
		  						</li>
		  					</ul>
		  				</div>
		  			</div>
		  			<div class="col-xl-10 col-lg-9 bg-light fixed-top ml-auto top-navbar">
		  				<!-- <div class="row"> -->
		  					<!-- <div class="col-md-3 py-3"> -->
		  						<a class="navbar-brand ml-5" href="client-list.php"><img src="../images/87x87 - png - logo.png"></a>
		  					<!-- </div> -->
		  					<!-- <div class="col-md-5 py-3"> -->
								<a class="btn btn-info btn-small text-white ml-auto" href="client-new.php">Add New Client</a>
		  					<!-- </div> -->
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		</div>
	</nav>
<!-- navbar section end -->

<!-- counter section start-->
<section id="count">
	<div class="row mt-lg-5">
		<div class="col-xl-10 col-lg-9 ml-auto">
			<!-- <div class="row"> -->
				<!-- <div class="col-sm-6 col-md-3 mt-5 mx-auto"> -->
					<div class="card card-common">
						<div class="card-body">
							<div class="d-flex justify-content-between">
								<i class="fas fa-chart-line text-danger fa-3x"></i>
								<div class="text-secondary text-right">
									<h5>Visitors</h5>
									<h6><?php echo $total_visitors; ?></h6>
								</div>
							</div>
						</div>
					</div>
				<!-- </div> -->
			<!-- </div> -->
		</div>
	</div>
</section>
	
	
<!-- counter section end -->

<!-- footer section start -->
	<footer class="text-muted mt-5 text-center">
		copyright &copy; <?php echo date("Y"); ?> HSP Digital Marketing Agency Co., ltd. All right reserved.		
	</footer>
<!-- footer section end -->


	<script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>