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
		  							<a href="client-list.php" class="nav-link text-white text-center">သုံးစွဲသူများ</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="service-list.php" class="nav-link text-white text-center sidebar-link">ဝန်ဆောင်မှုများ</a>
		  						</li>
		  						<li class="nav-item my-2">
		  							<a href="report.php" class="nav-link text-white text-center sidebar-link current">Monthly Clients</a>
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


<!-- report section start -->
	<section id="report" class="mt-5">
		<div class="row mt-lg-4">
				<div class="col-xl-9 col-lg-8 ml-auto">
				<!-- <div class="container" style="width: 300px;" class="mx-auto"> -->
					<!-- <div class="row">
						<div class="col-md-12 mt-5 mx-auto"> -->
							<form method="post" style="width: 500px;">
								<div class="container mt-5 mb-5">
									<h3 class="text-center mt-5">Search Client</h3>
									Start Date:
									<input type="date" name="start_date" class="form-control"><br><br>	
									End Date:
									<input type="date" name="end_date" class="form-control"><br><br>
											
									<input type="submit" name="search" value="Search Client" class="btn btn-info mr-3">
									<a href="client-list.php" class="btn btn-info">Back</a>
								</div>
							</form>
							<?php
								include_once "config/db-connect.php";

								if (isset($_POST['search'])) {
									$start_date = $_POST['start_date'];
									$end_date = $_POST['end_date'];

									$query = mysqli_query($conn,"SELECT cname,created_date FROM clients WHERE created_date BETWEEN '$start_date' AND '$end_date' ORDER BY created_date");
									$count = mysqli_num_rows($query);

									if ($count == "0") {
										echo "<h4 class='text-center text-danger mt-3'>Please select date!</h4>";
									}
									else{ ?>
										<table class='table table-striped bg-info mt-4'>
											<thead>
										    	<tr>
										    		<th>No</th>
													<th>Name</th>
													<th>Date</th>
												</tr>
											</thead>

											<?php $counter = 1;

											while ($row = mysqli_fetch_array($query)) {
											
												$result = $row['cname'];
												$date = $row['created_date'];
												// $output = "<ol><li>".$result."</li></ol>";
												$output = "<tbody>
																<tr>
																	<td>".$counter++."</td>
																	<td>".$result."</td>
																	<td>".$date."</td>
																</tr>
															</tbody>";
												echo $output;
											}?>
										</table>
									</div>
									<?php }
								}?>
								
						<!-- </div>
					</div> -->
				<!-- </div> -->
			</div>
		</div>
	</section>
	
<!-- report section end -->


 	<script src="../library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="../library/bootstrap/popper.min.js"></script>
	<script src="../library/bootstrap/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>

