<?php
include("../app/config/database.php");
include("../app/middleware/auth.php");
include("../layouts/header.php");
include("../layouts/sidebar.php");

$user_id = $_SESSION['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id=$user_id"));
?>

<h3>Profile</h3>
<ul class="list-group w-50">
<li class="list-group-item"><b>Name:</b> <?= $user['name'] ?></li>
<li class="list-group-item"><b>Email:</b> <?= $user['email'] ?></li>
</ul>

<a href="password.php" class="btn btn-warning mt-3">Change Password</a>

<?php include("../layouts/footer.php"); ?>
