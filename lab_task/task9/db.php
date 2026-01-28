<?php

$conn = mysqli_connect("locoalhost", "root", "", "task");

if (!conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>