<?php

?>

<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!DOCTYPE HTML>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>

		<div class="container-fluid">
			<div class="login-container bg-white shadow">
				<form action = "admin_profile_process.php" method = "POST">
					<h1 class="h3 mb-3 fw-normal">Admin Update Profile</h1>
					<div class="form-floating" >
                        <p style="font-size: 24px";> Admin name: <?php session_start();echo $_SESSION['admin']['username'] ?></p>
					</div>
					<div class="form-floating">
						<input type="password" class="form-control" id="floatingPassword" name = "password">
						<label for="floatingPassword">Password</label>
					</div>
                    <div class="form-floating">
						<input type="password" class="form-control" id="floatingPassword" name = "confirm_password">
						<label for="floatingPassword">Confirm Password</label>
					</div>
					<br/>
					<button class="w-100 btn btn-lg btn-primary" type="submit" name="signin">Modify</button>
				</form>
				<br/>
				<div class="d-grid gap-2 col-6 mx-auto">
					<a class="btn btn-md btn-warning btn-block" href="admin_tasks.php">Cancel</a>
				</div>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>

	</body>
</html>
