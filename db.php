<?php
$conn = new mysqli("localhost", "root", "", "farmer_dab");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
