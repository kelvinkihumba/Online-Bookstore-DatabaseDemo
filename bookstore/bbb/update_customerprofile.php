<!-- HTML by Andrew Moots & Miroslav Pavlovski w/ outline from Prithviraj Narahari & Alexander Martens & Bootstrap -->
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/custom.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>UPDATE CUSTOMER</title>
	</head>
	<body class="d-flex flex-column min-vh-100">
        
        <?php include("./view/header.php"); ?>

        <div class="container-fluid">
			<div class="standard-container bg-white shadow">
				<h1 class="h3 mb-3 fw-normal">Update Customer Profile</h1>
				<form class="row g-3" action ="update_customerprofile_process.php" method = "POST">
					<div class="col-md-6">
						<p style="font-size: 24px";> Username: <?php session_start();echo $_SESSION['user']['username'] ?></p>
					</div>
					<div class="col-md-3">
						<label for="inputPIN" class="form-label">New PIN</label>
						<input required type="password" class="form-control" id="inputPIN" name = "password">
					</div>
					<div class="col-md-3">
						<label for="inputPIN2" class="form-label">Re-Enter New PIN</label>
						<input required type="password" class="form-control" id="inputPIN2" name = "confirm_password">
					</div>
					<div class="col-md-6">
						<label for="inputFirstname" class="form-label">First Name</label>
						<input required type="text" class="form-control" id="inputFirstname" name = "first_name">
					</div>
					<div class="col-md-6">
						<label for="inputLastname" class="form-label">Last Name</label>
						<input required type="text" class="form-control" id="inputLastname" name="last_name">
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Address</label>
						<input required type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name ="address">
					</div>
					<div class="col-md-6">
						<label for="inputCity" class="form-label">City</label>
						<input required type="text" class="form-control" id="inputCity" name="city">
					</div>
					<div class="col-md-4">
						<label for="inputState" class="form-label">State</label>
						<select id="inputState" class="form-select" name = "state">
							<option selected disabled>Choose...</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="GU">Guam</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="PR">Puerto Rico</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</div>
					<div class="col-md-2">
						<label for="inputZip" class="form-label" >Zip</label>
						<input type="text" class="form-control" id="inputZip" name="zip">
					</div>
					<div class="col-md-3">
						<label for="inputCardType" class="form-label">Card Provider</label>
						<select id="inputCardType" class="form-select" name ="card">
							<option selected disabled>Choose...</option>
							<option value="D">Discover</option>
							<option value="M">MasterCard</option>
							<option value="V">Visa</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="inputCardNum" class="form-label">Credit Card Number</label>
						<input required type="number" class="form-control" id="inputCardNum" name="card_number">
					</div>
					<div class="col-md-3">
						<label for="inputExpDate" class="form-label">Exp. Date</label>
						<input required type="text" class="form-control" id="inputExpDate" placeholder="MM/YY" name="date">
					</div>
					<div class="col-6 text-end">
						<a class="btn btn-md btn-warning" href="confirm_order.php">Cancel</a>
					</div>
					<div class="col-6 text-start">
						<button type="submit" class="btn btn-primary" name="update_customer">Update</button>
					</div>
				</form>
			</div>
		</div>

		<?php include("./view/footer.php"); ?>

	</body>
</HTML>