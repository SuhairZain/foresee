<?php
include 'connection.php';
$location = $_GET['location'];
$speed = $_GET['speed'];

//insert
$sql = "INSERT INTO traffic (location, averageSpeed)
VALUES ('$location', '$speed')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>