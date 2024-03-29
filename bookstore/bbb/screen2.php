
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>SEARCH - 3-B.com</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>
        <form action = screen3.php method = "GET">
		<div class="container-fluid">
			<div class="standard-container bg-white shadow">
				
				<h1 class="h3 mb-3 fw-normal">New Search</h1>
				<div class="row">
					<div class="col-md-3">
						<div class="d-flex align-items-center" style="height: 100%;">
							<b>Search For:</b>
						</div>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="inputSearch" placeholder="Title, Author, etc..." name = "for">
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<div class="d-flex align-items-center" style="height: 100%;">
							<b>Search In:</b>
						</div>
					</div>
					<div class="col-md-6">
						<select class="form-select" multiple aria-label="multiple select example" name = "in">
							<option value="anywhere" selected='selected' >Keyword anywhere</option>
							<option value="title" >Title</option>
							<option value="author" >Author</option>
							<option value="publisher" >Publisher</option>
							<option value="isbn" >ISBN</option>	
						</select>
					</div>
					<div class="col-md-3 text-end">
						<a class="btn btn-md btn-secondary" href="shopping_cart.php">Manage Shopping Cart</a>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<div class="d-flex align-items-center" style="height: 100%;">
							<b>Category:</b>
						</div>
					</div>
					<div class="col-md-6">
						<select id="inputState" class="form-select" name="cat">
							<option selected ='selected'>All Categories</option>
							<option value='1' >Fantasy</option>
							<option value='2' >Adventure</option>
							<option value='3' >Fiction</option>
							<option value='4' >Horror</option>
						</select>
					</div>
					<div class="col-md-3 text-end">
						<a class="btn btn-md btn-warning" href="index.php">Exit 3-B.com</a>
					</div>
					
				</div>
				<div class="col-md-3 text-end">
					<button class="btn btn-md btn-primary" type="submit" name="submit" style="padding-left:50px; padding-right:50px; margin-left:150px; margin-top:50px">Search</button>
			   	</div>
			</div>
			
		</div>
        </form>
		<?php include("./view/footer.php"); ?>

	</body>
</html>
