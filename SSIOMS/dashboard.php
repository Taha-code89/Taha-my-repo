<?php
include("app/config/database.php");
include("app/middleware/auth.php");
include("layouts/header.php");
include("layouts/sidebar.php");

$productCount = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM products WHERE is_deleted=0"));
$categoryCount = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM categories WHERE is_deleted=0"));
$orderCount = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM orders WHERE is_deleted=0"));
?>

<h3 class="mb-4">Dashboard</h3>

<div class="row">
  <div class="col-md-4">
    <div class="card p-3">
      <h5>Total Products</h5>
      <h2><?= $productCount ?></h2>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5>Total Categories</h5>
      <h2><?= $categoryCount ?></h2>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5>Total Orders</h5>
      <h2><?= $orderCount ?></h2>
    </div>
  </div>
</div>
<h2>Welcome, <?php echo $_SESSION['name']; ?></h2>

<div class="card">
    <p>Inventory Management Dashboard</p>
</div>

<?php include("layouts/footer.php"); ?>



