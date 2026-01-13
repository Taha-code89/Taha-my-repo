<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

if(isset($_POST['save'])){
    mysqli_query($conn,"
        INSERT INTO products(name, category_id, price, stock, description)
        VALUES(
            '$_POST[name]',
            '$_POST[category_id]',
            '$_POST[price]',
            '$_POST[stock]',
            '$_POST[description]'
        )
    ");
    header("Location: index.php");
}
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Add Product</h3>

<form method="POST">

<input class="form-control mb-2" name="name" placeholder="Product Name" required>

<!-- CATEGORY DROPDOWN -->
<select class="form-control mb-2" name="category_id" required>
    <option value="">-- Select Category --</option>
    <?php
    $cats = mysqli_query($conn,"SELECT * FROM categories WHERE is_deleted=0");
    while($cat = mysqli_fetch_assoc($cats)){
        echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
    }
    ?>
</select>

<input class="form-control mb-2" name="price" placeholder="Price" required>
<input class="form-control mb-2" name="stock" placeholder="Stock" required>

<textarea class="form-control mb-2" name="description" placeholder="Description"></textarea>

<button class="btn btn-success" name="save">Save Product</button>

</form>

<?php include("../../layouts/footer.php"); ?>
