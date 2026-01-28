<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure CRUD System</title>
    <script src="script.js"></script>
</head>
<body>

<h2>Secure User Management</h2>

<!-- INSERT FORM -->
<form action="process.php" method="post" onsubmit="return validateForm()">
    <input type="text" name="username" id="username" placeholder="Username">
    <input type="email" name="email" id="email" placeholder="Email">
    <button type="submit" name="add">Add User</button>
</form>

<hr>

<!-- READ DATA -->
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()):
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="process.php?delete=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
