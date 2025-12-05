<?php
// Database verbinding
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "panorama_app"; // verander dit!

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
} 

?>