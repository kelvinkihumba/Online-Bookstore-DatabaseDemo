
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!DOCTYPE HTML>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">	
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>ADMIN TASKS</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>

		<div class="container-fluid">
			<div class="login-container text-center bg-white shadow">
				<h1 class="h3 mb-3 fw-normal">Admin Tasks</h1>
				<div class="d-grid gap-2 col-8 mx-auto">
					<a class="btn btn-md btn-primary btn-block" href="manage_bookstorecatalog.php">Manage Bookstore Catalog</a>
				</div>
				<br/>
				<div class="d-grid gap-2 col-8 mx-auto">
					<a class="btn btn-md btn-primary btn-block" href="placeorders.php">Place Orders</a>
				</div>
				<br/>
				<div class="d-grid gap-2 col-8 mx-auto">
					<a class="btn btn-md btn-primary btn-block" href="reports.php">Generate Reports</a>
				</div>
				<br/>
				<div class="d-grid gap-2 col-8 mx-auto">
					<a class="btn btn-md btn-primary btn-block" href="admin_profile.php">Update Admin Profile</a>
				</div>
				<br/>
				<div class="d-grid gap-2 col-8 mx-auto">
					<a class="btn btn-md btn-warning btn-block" href="index.php">Exist 3-B.com [Admin]</a>
				</div>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>
	</body>	
</html>