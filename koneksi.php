<?php
$host = "localhost";
$user = "xirpl1-9"; 
$pass = "0097119849";     
$db   = "db_xirpl1-9_1";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
