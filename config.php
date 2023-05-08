<?php 

$host = "localhost";
$user = "root";
$database = "words";
$password = '';

$connection = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($connection, "utf8"); // To show the different language


