<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /SIOMS/auth/login.php");
    exit();
}
