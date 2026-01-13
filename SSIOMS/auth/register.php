<?php
include("../app/config/database.php");

$msg = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "Email already exists";
    } else {
        mysqli_query($conn, "INSERT INTO users(name,email,password,role)
        VALUES('$name','$email','$password','staff')");
        $msg = "Registered successfully! You can login now.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Register</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="register">Register</button>
</form>

<p><?php echo $msg; ?></p>

<p>Already have an account? <a href="login.php">Login</a></p>

</body>
</html>
