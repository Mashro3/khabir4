<?php
session_start();
include "db.php";

// التحقق من أن المستخدم مسجل دخول
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];

// جلب بيانات المستخدم الحالية
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// عند الضغط على زر حفظ التعديلات
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $update = "UPDATE users SET 
                name='$name',
                password='$password'
               WHERE email='$email'";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('تم تحديث البيانات بنجاح');</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء التحديث');</script>";
    }
}
?>
