<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "crud";

$kon = mysqli_connect($host, $user, $password, $database);

if (!$kon) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
