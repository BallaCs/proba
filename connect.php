<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hegyongy";

$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error)
	die("Nem sikerült csatlakozni az adatbázishoz!" . $conn->connect_error);
?>