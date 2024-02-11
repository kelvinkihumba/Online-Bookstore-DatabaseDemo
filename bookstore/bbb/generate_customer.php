<?php
// show information at specific page
function show_info($str, $url)
{
    echo '<script> alert("'.$str.'"); location.href="'.$url.'";</script>';
}

// preprocess the input from form
function preprocess_input($input)
{
    return  htmlspecialchars(stripslashes($input));
}
if(isset($_POST['register']))
{
    $username = trim($_POST['username']);
    $username = preprocess_input($username);

    $password = trim($_POST['password']);
    $password = preprocess_input($password);

    $confirm_password = trim($_POST['confirm_password']);
    $confirm_password = preprocess_input($confirm_password);

    $fname = trim($_POST['first_name']);
    $fname = preprocess_input($fname);

    $lname = trim($_POST['last_name']);
    $lname = preprocess_input($lname);

    $address = trim($_POST['address']);
    $address = preprocess_input($address);

    $city = trim($_POST['city']);
    $city = preprocess_input($city);

    if(empty($_POST['state']))
    {
        show_info("Choose a state","customer_registration.php");
        exit;
    }
    $state = trim($_POST['state']);
    $state = preprocess_input($state);

    $zip = trim($_POST['zip']);
    $zip = preprocess_input($zip);

    if(empty($_POST['card']))
    {
        show_info("Choose a credit card type","customer_registration.php");
        exit;
    }
    $card = trim($_POST['card']);
    $card = preprocess_input($card);

    $card_number = trim($_POST['card_number']);
    $card_number = preprocess_input($card_number);


    $date = trim($_POST['exp_date']);
    $date = preprocess_input($date);

    if(strcmp($password, $confirm_password) != 0)
    {
        show_info("Passwords do not match","customer_registration.php");
        exit;
    }  

    // If username already exist, alert
    require_once('mysql_connect.php'); 
    $query = "SELECT * FROM customer WHERE username ='$username'";
    $res = mysqli_query($dbConnection, $query);
    if(mysqli_num_rows($res))
    {
        show_info("Username already exists. Please provide an alternative username.","customer_registration.php");
        exit;
    }
         
    $query = "INSERT INTO customer (username, password, first_name, last_name, address,city, state, zip, card_type, card_number, card_expiration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";      
   $stmt = mysqli_prepare($dbConnection , $query);
   if($stmt)
   {
       mysqli_stmt_bind_param($stmt, "sssssssssss", $username, $password,  $fname, $lname, $address, $city, $state, $zip, 
       $card, $card_number, $date);

       mysqli_stmt_execute($stmt);
       show_info("register successfully","customer_registration.php");
       mysqli_free_result($stmt);
       mysql_close($dbConnection);
   }
   else
   {
       show_info("Fail to register","customer_registration.php");
   }
}else {
    echo 'Error Occurred<br />';
    mysqli_stmt_close($stmt);
    mysqli_close($dbConnection);
}
?>