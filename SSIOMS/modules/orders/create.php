<?php
include("../../app/config/database.php");
include("../../app/middleware/auth.php");

if(isset($_POST['save'])){
  $product_id = $_POST['product_id'];
  $quantity = $_POST['quantity'];
  $price = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=$product_id"))['price'];
  $total = $quantity * $price;
  $date = date('Y-m-d');
  
  mysqli_query($conn,"INSERT INTO orders(product_id,quantity,total,order_date) 
                     VALUES($product_id,$quantity,$total,'$date')");
  header("Location: index.php");
}
?>

<?php include("../../layouts/header.php"); ?>
<?php include("../../layouts/sidebar.php"); ?>

<h3>Create Order</h3>
<form method="POST">
<select class="form-control mb-2" name="product_id">
<?php
$products = mysqli_query($conn,"SELECT * FROM products WHERE is_deleted=0");
while($p=mysqli_fetch_assoc($products)){
  echo "<option value='".$p['id']."'>".$p['name']." - ".$p['price']."</option>";
}
?>
</select>
<input class="form-control mb-2" type="number" name="quantity" placeholder="Quantity" required>
<button class="btn btn-primary" name="save">Create Order</button>
</form>

<?php include("../../layouts/footer.php"); ?>
