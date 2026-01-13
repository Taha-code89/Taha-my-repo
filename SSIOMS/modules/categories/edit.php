<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

$id = $_GET['id'];
$cat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM categories WHERE id=$id"));

if(isset($_POST['update'])){
  mysqli_query($conn,"UPDATE categories SET name='".$_POST['name']."' WHERE id=$id");
  header("Location: index.php");
}
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Edit Category</h3>
<form method="POST">
  <input class="form-control mb-2" name="name" value="<?= $cat['name'] ?>">
  <button class="btn btn-primary" name="update">Update</button>
</form>

<?php include("../../layouts/footer.php"); ?>
