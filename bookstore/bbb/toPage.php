<?php
if (isset($_POST['group1'])){
    $page = $_POST['group1'];
    if ($page==2){
        header("Location: screen2.php");
        exit();
    }
    else if ($page==3){
        header("Location: customer_registration.php");
        exit();
    }
    else if ($page==4){
        header("Location: user_login.php");
        exit();
    }
    else {
        header("Location: admin_login.php");
        exit();
    }
    
}
?>