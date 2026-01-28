<?php
include "db.php";

/* INSERT */
if (isset($_POST['add'])) {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);

    // Server-side validation
    if (!empty($username) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $stmt = $conn->prepare(
            "INSERT INTO users (username, email) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php");
}

/* DELETE */
if (isset($_GET['delete'])) {

    $id = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>
