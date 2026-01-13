<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");
include("../../layouts/header.php");
include("../../layouts/sidebar.php");

$q = mysqli_query($conn,"SELECT o.*, p.name AS product_name FROM orders o LEFT JOIN products p ON o.product_id=p.id WHERE o.is_deleted=1");
?>

<h3>Deleted Orders</h3>
<table class="table table-bordered">
<tr><th>Product</th><th>Qty</th><th>Total</th><th>Action</th></tr>
<?php while($r=mysqli_fetch_assoc($q)): ?>
<tr>
<td><?= $r['product_name'] ?></td>
<td><?= $r['quantity'] ?></td>
<td><?= $r['total'] ?></td>
<td><a href="restore.php?id=<?= $r['id'] ?>">Restore</a></td>
</tr>
<?php endwhile; ?>
</table>
<?php include("../../layouts/footer.php"); ?>
