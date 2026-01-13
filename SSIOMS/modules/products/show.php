<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

$id = $_GET['id'];
$product = mysqli_fetch_assoc(
  mysqli_query($conn,"SELECT * FROM products WHERE id=$id")
);
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Product Details</h3>

<ul class="list-group">
<li class="list-group-item"><b>Name:</b> <?= $product['name'] ?></li>
<li class="list-group-item"><b>Price:</b> <?= $product['price'] ?></li>
<li class="list-group-item"><b>Stock:</b> <?= $product['stock'] ?></li>
<li class="list-group-item"><b>Description:</b> <?= $product['description'] ?></li>
</ul>

<?php include("../../layouts/footer.php"); ?>