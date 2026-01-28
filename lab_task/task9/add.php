<?php
    include "db.php";
    include "header.php";

    if(isset($_POST['submit'])) {

        $productName    = $_POST['name'];
        $productType    = $_POST['type'];
        $productCompany = $_POST['company'];
        $productPrice   = $_POST['price'];

        $sql = "INSERT INTO products (Name, Type, Company, Price)
                VALUES ('$productName', '$productType', '$productCompany', '$productPrice')";

        mysqli_query($conn, $sql);

        header("Location: product.php");
        exit;
    }

?>