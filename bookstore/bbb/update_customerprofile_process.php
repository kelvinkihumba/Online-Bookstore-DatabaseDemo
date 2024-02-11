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

if(isset($_POST['update_customer']))
{
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
        show_info("Choose a state","update_customerprofile.php");
        exit;
    }
    $state = trim($_POST['state']);
    $state = preprocess_input($state);

    $zip = trim($_POST['zip']);
    $zip = preprocess_input($zip);

    if(empty($_POST['card']))
    {
        show_info("Choose a credit card type","update_customerprofile.php");
        exit;
    }
    $card = trim($_POST['card']);
    $card = preprocess_input($card);


    $card_number = trim($_POST['card_number']);
    $card_number = preprocess_input($card_number);


    $date = trim($_POST['date']);
    $date = preprocess_input($date);

    if($password !== $confirm_password)
    {
        show_info("Passwords don't match", "update_customerprofile.php");
    }
    else{
        session_start();
        require_once('mysql_connect.php'); 
        $query = "UPDATE customer SET password ='$password', first_name = '$fname',last_name ='$lname',
         address = '$address', city ='$city', state='$state',zip='$zip', card_type ='$card', 
         card_number='$card_number', card_expiration ='$date' WHERE username ='".$_SESSION['user']['username']."'" ;


        $result = mysqli_query($dbConnection, $query);
        
       if($result)
        {
            show_info("Customer updated successfully", "confirm_order.php");
        }
        else{
            show_info("Error updating customer", "update_customerprofile.php");
        }
        //mysqli_free_result($result);
        mysqli_close($dbConnection);
    }
}
?>