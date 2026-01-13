<?php
include "db.php";      // DB connection
include "header.php";  // Header include

// Check if form submitted
if (isset($_POST['submit'])) {

    // Get form data
    $productName    = $_POST['name'];
    $productType    = $_POST['type'];
    $productCompany = $_POST['company'];
    $productPrice   = $_POST['price'];

    // Insert into database
    $sql = "INSERT INTO products (Name, Type, Company, Price) 
            VALUES ('$productName', '$productType', '$productCompany', '$productPrice')";

    mysqli_query($conn, $sql);

    // Redirect to products page
    header("Location: product.php");
    exit;
}
?>

<h2>Add New Product</h2>

<form method="post">
    <div>
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter product name" required>
    </div><br>

    <div>
        <label for="type">Product Type:</label><br>
        <input type="text" id="type" name="type" placeholder="Enter type" required>
    </div><br>

    <div>
        <label for="company">Company:</label><br>
        <input type="text" id="company" name="company" placeholder="Company name" required>
    </div><br>

    <div>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" placeholder="Enter price" required>
    </div><br>

    <button type="submit" name="submit">Add Product</button>
</form>

<?php include "footer.php"; ?>