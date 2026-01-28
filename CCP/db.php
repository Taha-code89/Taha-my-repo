<?php
$conn = new mysqli("localhost", "root", "", "secure_crud");

if ($conn->connect_error) {
    die("Connection failed");
}
?>
