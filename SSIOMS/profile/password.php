<?php
include("../app/config/database.php");
include("../app/middleware/auth.php");

$user_id = $_SESSION['user_id'];
if(isset($_POST['change'])){
  $current = $_POST['current'];
  $new = $_POST['new'];
  $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id=$user_id"));

  if(password_verify($current,$user['password'])){
    $hash = password_hash($new,PASSWORD_DEFAULT);
    mysqli_query($conn,"UPDATE users SET password='$hash' WHERE id=$user_id");
    $msg = "Password updated successfully!";
  } else {
    $msg = "Current password incorrect!";
  }
}
?>

<?php include("../layouts/header.php"); ?>
<?php include("../layouts/sidebar.php"); ?>

<h3>Change Password</h3>
<?php if(isset($msg)) echo "<p>$msg</p>"; ?>
<form method="POST" class="w-50">
<input class="form-control mb-2" type="password" name="current" placeholder="Current Password" required>
<input class="form-control mb-2" type="password" name="new" placeholder="New Password" required>
<button class="btn btn-primary" name="change">Update Password</button>
</form>

<?php include("../layouts/footer.php"); ?>
