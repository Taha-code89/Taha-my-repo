<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

$id=$_GET['id'];
$order = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT o.*, p.name AS product_name 
FROM orders o 
LEFT JOIN products p ON o.product_id=p.id
WHERE o.id=$id
"));
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Order Details</h3>
<ul class="list-group">
<li class="list-group-item"><b>Product:</b> <?= $order['product_name'] ?></li>
<li class="list-group-item"><b>Quantity:</b> <?= $order['quantity'] ?></li>
<li class="list-group-item"><b>Total:</b> <?= $order['total'] ?></li>
<li class="list-group-item"><b>Date:</b> <?= $order['order_date'] ?></li>
</ul>

<?php include("../../layouts/footer.php"); ?>
