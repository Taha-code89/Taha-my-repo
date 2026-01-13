<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

$id = $_GET['id'];
$product = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM products WHERE id=$id")
);

if(isset($_POST['update'])){
    mysqli_query($conn,"
        UPDATE products SET
        name='$_POST[name]',
        category_id='$_POST[category_id]',
        price='$_POST[price]',
        stock='$_POST[stock]',
        description='$_POST[description]'
        WHERE id=$id
    ");
    header("Location: index.php");
}
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Edit Product</h3>

<form method="POST">

<input class="form-control mb-2" name="name" value="<?= $product['name'] ?>">

<select class="form-control mb-2" name="category_id">
<?php
$cats = mysqli_query($conn,"SELECT * FROM categories WHERE is_deleted=0");
while($cat = mysqli_fetch_assoc($cats)){
    $selected = ($cat['id'] == $product['category_id']) ? "selected" : "";
    echo "<option value='{$cat['id']}' $selected>{$cat['name']}</option>";
}
?>
</select>

<input class="form-control mb-2" name="price" value="<?= $product['price'] ?>">
<input class="form-control mb-2" name="stock" value="<?= $product['stock'] ?>">
<textarea class="form-control mb-2" name="description"><?= $product['description'] ?></textarea>

<button class="btn btn-primary" name="update">Update</button>

</form>

<?php include("../../layouts/footer.php"); ?>
