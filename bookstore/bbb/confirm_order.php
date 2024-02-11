
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!DOCTYPE HTML>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">	
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CONFIRM ORDER</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>
		<form action="proof_purchase.php" method="post">
		<div class=container-fluid>
			<div class="standard-container bg-white shadow">
				<h1 class="h3 mb-3 fw-normal">Confirm Order</h1>

				<?php 
						require_once('mysql_connect.php');					
						session_start();
						if (isset($_SESSION['customer'])){
							$name = $_SESSION['customer'];
							
						}

						$query = "SELECT * from customer where username='".$_SESSION['customer']."'";
						$response = @mysqli_query($dbConnection, $query);

						if ($response){
							while ($row = mysqli_fetch_array($response)){
								echo '<div class="row">
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
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
											
										</div>
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-12">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
											<label class="form-check-label" for="flexRadioDefault1">
												Use Credit Card on file
											</label>
										</div>
										<div class="col-md-12">
											'.$row[8].' '.$row[9].'
										</div>
										<div class="col-md-12">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
											<label class="form-check-label" for="flexRadioDefault2">
												New Credit Card
											</label>
										</div>
										<div class="col-md-5">
											<select id="inputCardType" class="form-select">
												<option selected disabled>Choose...</option>
												<option value="D">Discover</option>
												<option value="M">MasterCard</option>
												<option value="V">Visa</option>
											</select>
										</div>
										<div class="col-md-7">
											<input type="number" class="form-control" id="inputCardNum" placeholder="Enter credit card number">
										</div>
									</div>
								</div>
							</div>';
							}
						}

						if ($_SESSION['id'] != null){
							$isbn = $_SESSION['id'];
							$countVal = array_count_values($isbn);

							echo '<div class="cart-container">
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
										<div class="body">';

							$total = 0;
							foreach ($countVal as $value => $counter) {
								
								$query = "select * from book where isbn = ".$value."";
								$response = @mysqli_query($dbConnection, $query);
								
								if ($response){
									while ($row = mysqli_fetch_array($response)){
										$total += $counter*$row[3];
										echo '
											<div class="row">
												<div class="col-md-9">
													<p>
														'.$row[0].'<br/>
														<b>By:</b> '.$row[1].'<br/>
														<b>Price:</b> '.$counter*$row[3].'
													</p>
												</div>
												<div class="col-md-1 text-center">
													'.$counter.'
												</div>
												<div class="col-md-2 text-end">
													'.$counter*$row[3].'
												</div>
											</div>';
									}
									$_SESSION['total'] = $total;
								}
							}
							mysqli_close($dbConnection);
							echo '</div>
									</div>';
						}
				?>

				<div class="row">
					<div class="col-md-5">
						<p class="shipping-note"><b>SHIPPING NOTE:</b> The books will be delivered within 5 business days.</p>
					</div>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-7 text-end">
								<b>Subtotal:</b>
							</div>
							<div class="col-md-5">
								<?php echo $_SESSION['total']; ?>
							</div>
							<div class="col-md-7 text-end">
								<b>Shipping & Handling:</b>
							</div>
							<div class="col-md-5">
							<?php session_start(); echo count($_SESSION['id'])*2; ?>
							</div>
							<div class="col-md-12">
								<hr>
							</div>
							<div class="col-md-7 text-end">
								<b>Total:</b>
							</div>
							<div class="col-md-5">
								<?php echo $_SESSION['total'] + count($_SESSION['id'])*2; ?>
							</div>
						</div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<a class="btn btn-md btn-warning" href="screen2.php">Cancel</a>
					</div>
					<div class="col-md-6 text-center">
						<a class="btn btn-md btn-secondary" href="update_customerprofile.php">Update Customer Profile</a>
					</div>
					<div class="col-md-3 text-end">
						<button type="submit" class="btn btn-md btn-primary" href="#">Place Order</button>
					</div>
				</div>
			</div>
		</div>
		</form>
		<?php include("./view/footer.php"); ?>
		
	</body>
</HTML>
