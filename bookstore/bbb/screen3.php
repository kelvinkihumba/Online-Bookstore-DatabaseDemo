
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!-- Modified by Kelvin Kihumba and Huanhuan Cheng -->
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title> Search Result - 3-B.com </title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>
        
        <div class="container-fluid">
			<div class="standard-container bg-white shadow">
				<h1 class="h3 mb-3 fw-normal">Search Results</h1>
				<div class="row">
					<div class="col-md-6" id = "cart">
						Your shopping cart has 0 items
					</div>
					<div class="col-md-6 text-end">
						<a class="btn btn-md btn-primary" href="shopping_cart.php">Manage Shopping Cart</a>
					</div>
				</div>
				<div class="cart-container">
					<div class="row head">
						<div class="col-md-3 text-center">
							Controls
						</div>
						<div class="col-md-7">
							Book Description
						</div>
						<div class="col-md-2 text-end">
							Price
						</div>
					</div>
					<div class="body">
						
						<?php 
						require_once('mysql_connect.php');					
						session_start();
						if (isset($_GET['num'])){
							$num = $_GET['num'];
							$cart = [];
							if ($_SESSION['id'] != null)
							$cart = $_SESSION['id'];
							array_push($cart,$num);
							$_SESSION['id'] = $cart;

						}
						
						if (isset($_GET['for'])){
							$everywhere = $_GET['for'];						
						}
						if (isset($_GET['in'])){
							$keyword =  $_GET['in'];
						}
						if (isset($_GET['cat'])){
							$cat = $_GET['cat'];
						}
						else{
							$query = "select * from book"; 
						} 

						echo $everywhere;
						
						$response = @mysqli_query($dbConnection, $query);
						if($response){
					    
							while ($row = mysqli_fetch_array($response)){
								echo '<div class="row">
								<div class="col-md-3 text-center">
									<a class="btn btn-sm btn-primary add" href="screen3.php?num='.$row[4].'" id="'.$row[4].'">Add to Cart</a>
									<br/>
									<br/>
									<a class="btn btn-sm btn-secondary" href="screen4.php?id='.$row[4].'">Reviews</a>
								</div>
								<div class="col-md-7">
									<p>
										'.$row[0].'<br/>
										<b>By:</b> '.$row[1].'<br/>
										<b>Publisher:</b> '.$row[2].'<br/>
										<b>ISBN:</b> '.$row[4].'<br/>
									</p>
								</div>
								<div class="col-md-2 text-end">
									$'.$row[3].'
								</div>
							</div>';
							}
							mysqli_close($dbConnection);
						} 

						?>
							<script type="text/javascript">
								<?php
								$value = 0;
								if (isset($_SESSION['id']))
								$value = count($_SESSION['id']);
								?>
								var count = '<?php echo $value;?>';
								//var shopList = [];
								let cart = document.querySelector('#cart');
								cart.innerHTML = "<p>Your shopping cart has "+count+" items</p>";
								/*
								document.querySelectorAll('.add').forEach(item=>{
									item.addEventListener('click',function(){
										count++;
										item.value = count;
										cart.innerHTML = "<p>Your shopping cart has "+count+" items</p>";
									})
								})*/
							</script>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<a class="btn btn-md btn-warning" href="index.php">Exit 3-B.com</a>
					</div>
					<div class="col-md-4">
						<a class="btn btn-md btn-secondary" href="screen2.php">New Search</a>
					</div>
					<div class="col-md-5 text-end">
						<a type="submit" class="btn btn-md btn-primary" 
						<?php 
						if (isset($_SESSION['customer'])){
							echo 'href="confirm_order.php"';
						}
						else{
							echo 'href="customer_registration.php"'; 
						}
						
						?>
						>Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>

	</body>
</html>
