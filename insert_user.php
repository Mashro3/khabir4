<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "تم إنشاء الحساب بنجاح";
    header("Location: login.html");
    exit();
} else {
    echo "خطأ: " . mysqli_error($conn);
}
?>
