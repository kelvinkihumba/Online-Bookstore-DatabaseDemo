<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD','DBA571');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'bbb');

$dbConnection =mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to database'.mysqli_connect_error());
?>
