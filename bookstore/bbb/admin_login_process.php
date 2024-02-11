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

if(isset($_POST['signin']))
{
    $username = trim($_POST['username']);
    $username = preprocess_input($username);

    $password = trim($_POST['password']);
    $password = preprocess_input($password);

    require_once('mysql_connect.php');	
    $query = "SELECT * FROM administrator WHERE username ='".$username."'";
    $result = mysqli_query($dbConnection, $query);
    $dat = mysqli_fetch_assoc($result);
    
    if($dat)
    {
        if($dat['password'] == $password)
        {
            session_start();
            $_SESSION['admin'] = $dat;
            show_info("Login successfully","admin_tasks.php");
        }
        else
        {
            show_info("Password is not correct","admin_login.php");
        }
    }
    else
    {
        show_info("Username doesn't exist.","admin_login.php");
    }
    mysqli_free_result($result);
    mysqli_close($dbConnection);
}
?>