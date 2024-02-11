
<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<!-- Modified by Kelvin Kihumba and Huanhuan Cheng -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>BOOK REVIEWS - 3-B.com</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>

        <div class="container-fluid">
			<div class="standard-container bg-white shadow">
				<h1 class="h3 mb-3 fw-normal">Reviews</h1>
				<?php
				require_once('mysql_connect.php');
				$id = $_GET['id'];
				$query = "select * from review where isbn = ".$id."";
				$query2 = "select title from book where isbn = ".$id."";
				$response = @mysqli_query($dbConnection, $query);
				$response2 = @mysqli_query($dbConnection, $query2);

				if ($response){
					$comments = '';
					while ($row = mysqli_fetch_array($response)){
						$comments = $comments.'<div class="row">
										<div class="col">'
												.$row[1].'
										</div>
									 </div>';
					}
					
				echo '<p><b>Reviews for:</b>'.mysqli_fetch_array($response2)[0].'</p>
				<div class="reviews-container">'
					.$comments.'
				</div>';
				}
				
				?>
				
				</div>
				<div class="text-center">
					<a class="btn btn-md btn-primary" href="screen3.php">Done</a>
				</div>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>

	</body>
</html>
