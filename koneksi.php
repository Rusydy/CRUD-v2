<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$name = "db_stik";
$port = 3316; // Default MySQL port, change if needed

$koneksi = mysqli_connect($host, $user, $pass, $name, $port);
if (!$koneksi)
{
    echo "Database tidak bisa terkoneksi !" . mysqli_connect_error();
    exit();
}
?>
