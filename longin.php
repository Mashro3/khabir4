<?php
session_start();
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['email'] = $email;
    header("Location: update_page.php");
    exit();
} else {
    echo "❌ البريد أو كلمة المرور غير صحيحة";
}
?>
