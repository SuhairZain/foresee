<?php
$servername = "localhost";
$username = "colorowe_krsh";
$password = "@ngel#@ck123";
$database = "colorowe_krsh";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 