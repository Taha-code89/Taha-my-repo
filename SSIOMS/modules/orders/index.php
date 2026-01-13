<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");
include("../../layouts/header.php");
include("../../layouts/sidebar.php");

$q = mysqli_query($conn,"SELECT o.*, p.name AS product_name 
                         FROM orders o 
                         LEFT JOIN products p ON o.product_id=p.id
                         WHERE o.is_deleted=0");
?>

<h3>Orders</h3>
<a href="create.php" class="btn btn-success mb-3">Create Order</a>

<table class="table table-bordered">
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Total</th>
<th>Order Date</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($q)): ?>
<tr>
<td><?= $row['product_name'] ?></td>
<td><?= $row['quantity'] ?></td>
<td><?= $row['total'] ?></td>
<td><?= $row['order_date'] ?></td>
<td>
<a href="show.php?id=<?= $row['id'] ?>">View</a> |
<a onclick="return confirm('Delete?')" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>

<a href="trash.php">Deleted Orders</a>

<?php include("../../layouts/footer.php"); ?>
