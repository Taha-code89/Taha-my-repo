<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

if(isset($_POST['save'])){
  mysqli_query($conn,"INSERT INTO categories(name) VALUES('".$_POST['name']."')");
  header("Location: index.php");
}
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Add Category</h3>
<form method="POST">
  <input class="form-control mb-2" name="name" placeholder="Category Name">
  <button class="btn btn-primary" name="save">Save</button>
</form>

<?php include("../../layouts/footer.php"); ?>
