<?php

$host = 'localhost';
$dbname = 'dotstore';    
$username = 'root';      
$password = '';          


$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>