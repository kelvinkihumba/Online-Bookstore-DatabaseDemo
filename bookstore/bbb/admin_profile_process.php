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
    $password = trim($_POST['password']);
    $password = preprocess_input($password);

    $confirm_password = trim($_POST['confirm_password']);
    $confirm_password = preprocess_input($confirm_password);

    if($password !== $confirm_password)
    {
        show_info("Passwords don't match", "admin_profile");
    }
    else{
        session_start();
        require_once('mysql_connect.php'); 
        $query = "UPDATE administrator SET password ='".$password."' WHERE username ='".$_SESSION['admin']['username']."'" ;
        $result = mysqli_query($dbConnection, $query);
        if($result)
        {
            show_info("Password updated successfully", "admin_tasks.php");
        }
        else{
            show_info("Error updating password", "admin_profile.php");
        }
        mysqli_free_result($result);
        mysqli_close($dbConnection);
    }


}   
?>