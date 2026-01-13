<?php
include("../../app/config/database.php");
$id = $_GET['id'];
mysqli_query($conn,"UPDATE categories SET is_deleted=1 WHERE id=$id");
header("Location: index.php");
