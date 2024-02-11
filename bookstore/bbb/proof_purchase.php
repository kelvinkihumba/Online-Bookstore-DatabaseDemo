
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!DOCTYPE HTML>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>PROOF OF PURCHASE</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>

		<div class="container-fluid">
			<div class="standard-container bg-white shadow">
				<h1 class="h3 mb-3 fw-normal">Proof of Purchase</h1>
				<div class="row">
					<div class="col-md-4">
						<div class="row">
							<?php
							require_once('mysql_connect.php');					
						session_start();
						$name = $_SESSION['customer'];
						
						$query = "SELECT * from customer where username='".$_SESSION['customer']."'";
						$response = @mysqli_query($dbConnection, $query);

						if ($response){
							while ($row = mysqli_fetch_array($response)){
								echo '<div class="col-md-12">
								'.$row[2].' '.$row[3].'
							</div>
							<div class="col-md-12">
								'.$row[4].'
							</div>
							<div class="col-md-12">
								'.$row[5].'
							</div>
							<div class="col-md-6">
							 	'.$row[6].'
							</div>
							<div class="col-md-6">
								'.$row[7].'
							</div>';

						date_default_timezone_set("America/New_York");
						$currDate = date("Y-m-d");
						$currTime = date("H:i:s");

						echo '</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-5 text-end">
								<b>User ID:</b>
							</div>
							<div class="col-md-6">
								'.$row[0].'
							</div>
							<div class="col-md-5 text-end">
								<b>Date:</b>
							</div>
							<div class="col-md-6">
								'.$currDate.'
							</div>
							<div class="col-md-5 text-end">
								<b>Time:</b>
							</div>
							<div class="col-md-6">
								'.$currTime.'
							</div>
							<br/>
							<br/>
							<div class="col-md-12 text-center">
								<b>Credit Card Information:</b>
							</div>
							<div class="col-md-12 text-center">
								'.$row[8].' '.$row[9].'
							</div>';
						}
						}
						
						$query = "INSERT INTO make_order(order_date, order_time, username) values('".$currDate."', '".$currTime."', '".$name."')";
						$response = @mysqli_query($dbConnection, $query);
						if ($response){
							
						}
							?>
						</div>
					</div>
				</div>
				<div class="cart-container">
					<div class="row head">
						<div class="col-md-9">
							Book Description
						</div>
						<div class="col-md-1 text-center">
							Qty
						</div>
						<div class="col-md-2 text-end">
							Price
						</div>
					</div>
					<div class="body">
						<?php
							require_once('mysql_connect.php');					
							session_start();

							if (isset($_SESSION['customer'])){
								$name = $_SESSION['customer'];
							}
							
							if (isset($_SESSION['id'])){
								$isbn = $_SESSION['id'];
							}

							$countVal = array_count_values($isbn);

							$query = "SELECT * from customer where username='".$_SESSION['customer']."'";
							$response2 = @mysqli_query($dbConnection, $query);

							foreach ($countVal as $value => $counter) {
								$query = "select * from book where isbn = ".$value."";
								$response = @mysqli_query($dbConnection, $query);
								
								if ($response){
									while ($row = mysqli_fetch_array($response)){
										echo '<div class="row">
										<div class="col-md-9">
											<p>
												'.$row[0].'<br/>
												<b>By:</b> '.$row[1].'<br/>
												<b>Price:</b> '.$row[3].'
											</p>
										</div>
										<div class="col-md-1 text-center">
										'.$counter.'
										</div>
										<div class="col-md-2 text-end">
											'.$row[3]*$counter.'
										</div>
									</div>';
									}	
								}
							}
							mysqli_close($dbConnection);
						?>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<p class="shipping-note"><b>SHIPPING NOTE:</b> The books will be delivered within 5 business days.</p>
					</div>
					<div class="col-md-7">
						<?php
						session_start();

						if (isset($_SESSION['total']))
						$total = $_SESSION['total'];
						
						echo '<div class="row">
							<div class="col-md-7 text-end">
								<b>Subtotal:</b>
							</div>
							<div class="col-md-5">
								'.$total.'
							</div>
							<div class="col-md-7 text-end">
								<b>Shipping & Handling:</b>
							</div>
							<div class="col-md-5">
								$16.00
							</div>
							<div class="col-md-12">
								<hr>
							</div>
							<div class="col-md-7 text-end">
								<b>Total:</b>
							</div>';
							?>
							<div class="col-md-5">
							 	<?php echo $_SESSION['total'] + 16; ?>
							</div>
						</div>
						
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-4">
						<a class="btn btn-md btn-warning" href="index.php">Exit 3-B.com</a>
					</div>
					<div class="col-md-4 text-center">
						<a class="btn btn-md btn-secondary" href="#">Print</a>
					</div>
					<div class="col-md-4 text-end">
						<a class="btn btn-md btn-primary" href="screen2.php">New Search</a>
					</div>
				</div>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>

	</body>
</HTML>
