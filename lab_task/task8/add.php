<?php
include "db.php";
include "header.php";

if (isset($_POST['submit'])) {

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

<h2 class="text-center" style="margin-top: 20px; padding-left: 50px;">Add New Product</h2>
<div class="container" style="max-width: 150px; margin-top: 20px;">
<form method="post">
    <label>Product Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Product Type</label><br>
    <input type="text" name="type" required><br><br>

    <label>Company</label><br>
    <input type="text" name="company" required><br><br>

    <label>Price</label><br>
    <input type="number" name="price" required><br><br>

    <button type="submit" name="submit">Add Product</button>
</form>
</div>

<?php include "footer.php"; ?>
