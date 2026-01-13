<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");
include("../../layouts/header.php");
include("../../layouts/sidebar.php");

$q = mysqli_query($conn,"SELECT * FROM categories WHERE is_deleted=1");
?>

<h3>Deleted Categories</h3>
<table class="table table-bordered">
<tr><th>Name</th><th>Action</th></tr>

<?php while($row=mysqli_fetch_assoc($q)): ?>
<tr>
<td><?= $row['name'] ?></td>
<td><a href="restore.php?id=<?= $row['id'] ?>">Restore</a></td>
</tr>
<?php endwhile; ?>
</table>

<?php include("../../layouts/footer.php"); ?>
