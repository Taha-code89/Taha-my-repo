<?php
include("../app/config/database.php");
include("../app/middleware/auth.php");
include("../layouts/header.php");
include("../layouts/sidebar.php");

$q = mysqli_query($conn,"SELECT p.*, c.name AS category FROM products p LEFT JOIN categories c ON p.category_id=c.id WHERE p.is_deleted=0");
?>

<h3>Stock Report</h3>
<table class="table table-bordered">
<tr><th>Product</th><th>Category</th><th>Stock</th></tr>
<?php while($r=mysqli_fetch_assoc($q)): ?>
<tr>
<td><?= $r['name'] ?></td>
<td><?= $r['category'] ?></td>
<td><?= $r['stock'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<?php include("../layouts/footer.php"); ?>
