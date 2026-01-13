<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");
include("../../layouts/header.php");
include("../../layouts/sidebar.php");

$query = mysqli_query($conn,"SELECT * FROM categories WHERE is_deleted=0");
?>

<h3>Categories</h3>
<a href="create.php" class="btn btn-success mb-3">Add Category</a>

<table class="table table-bordered">
<tr>
  <th>Name</th>
  <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)): ?>
<tr>
  <td><?= $row['name'] ?></td>
  <td>
    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
    <a onclick="return confirm('Delete?')" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>

<a href="trash.php">Deleted Categories</a>

<?php include("../../layouts/footer.php"); ?>
