<?php
include("../../app/config/database.php");
$id = $_GET['id'];

mysqli_query($conn,"UPDATE products SET is_deleted=1 WHERE id=$id");
header("Location: index.php");
