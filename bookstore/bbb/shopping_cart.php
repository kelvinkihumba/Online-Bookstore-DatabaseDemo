
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!-- Modified by Kelvin Kihumba and Huanhuan Cheng -->
<!DOCTYPE HTML>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Shopping Cart</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>

		<div class="container-fluid">
			<div class="standard-container bg-white shadow">
					<h1 class="h3 mb-3 fw-normal">Shopping Cart</h1>
					<div class="row">
						<div class="col-md-3">
							<a class="btn btn-md btn-warning" href="index.php">Exit 3-B.com</a>
						</div>
						<div class="col-md-3">
							<a class="btn btn-md btn-secondary" href="screen2.php">New Search</a>
						</div>
						<div class="col-md-6 text-end">
							<a class="btn btn-md btn-primary" href="confirm_order.php">Proceed to Checkout</a>
						</div>
					</div>
					<div class="cart-container">
						<div class="row head">
							<div class="col-md-2">
								Remove
							</div>
							<div class="col-md-7">
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
										if (isset($_SESSION))
										$isbn = $_SESSION['id'];
										$temp = [];

										if (isset($_GET['del'])){
											
											$del = $_GET['del'];
										
											foreach($isbn as $val){
												if ($val != $del){
													array_push($temp,$val);
												}
							
												session_destroy();
												session_start();
											}

											$_SESSION['id'] = $temp;
											$isbn = $_SESSION['id'];
										}
										
										$countVal = array_count_values($isbn);
										$total = 0;
										
										foreach ($countVal as $value => $counter) {
											$query = "select * from book where isbn = ".$value."";
											$response = @mysqli_query($dbConnection, $query);
											if ($response){
												while ($row = mysqli_fetch_array($response)){
													
													$total += $row[3]*$counter;
													echo '<div class="row">
													<div class="col-md-2">
													<a class="btn btn-md btn-danger" href="shopping_cart.php?del='.$row[4].'">Delete</a>
													</div>
													<div class="col-md-7">
													<p>';
													echo $row[0].'<br/>
													<b>By:</b> '.$row[1].'<br/>
													<b>Price:</b> '.$row[3];
													echo '</p>
													</div>
													<div class="col-md-1 text-center">'
														.$counter.'
													</div>
													<div class="col-md-2 text-end">'
														.$counter*$row[3].'
													</div>
												</div>';
												}	
											}
										}
										?>
								
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<a class="btn btn-md btn-secondary" href="#">Recalculate Payment</a>
						</div>
						<div class="col-md-6 text-end">
							<b>Subtotal:</b> $<?php echo $total;?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>

	</body>
</html>
