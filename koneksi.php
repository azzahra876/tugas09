<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";   
$user = "root";      
$pass = "";     
$db   = "db_xirpl1_9_1"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);