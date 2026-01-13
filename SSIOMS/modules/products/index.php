<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");
include("../../layouts/header.php");
include("../../layouts/sidebar.php");

$query = mysqli_query($conn,"
SELECT p.*, c.name AS category
FROM products p
LEFT JOIN categories c ON p.category_id=c.id
WHERE p.is_deleted=0
");
?>

<h3>Products</h3>
<a href="create.php" class="btn btn-success mb-3">Add Product</a>

<table class="table table-bordered">
<tr>
  <th>Name</th>
  <th>Category</th>
  <th>Price</th>
  <th>Stock</th>
  <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)): ?>
<tr>
  <td><?= $row['name'] ?></td>
  <td><?= $row['category'] ?></td>
  <td><?= $row['price'] ?></td>
  <td><?= $row['stock'] ?></td>
  <td>
    <a href="show.php?id=<?= $row['id'] ?>">View</a> |
    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
    <a onclick="return confirm('Delete product?')" 
       href="delete.php?id=<?= $row['id'] ?>">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>

<a href="trash.php">View Deleted Products</a>

<?php include("../../layouts/footer.php"); ?>
