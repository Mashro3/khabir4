<?php
session_start();
include "db.php";

$email = $_SESSION['email'];

$new_name = $_POST['name'];
$new_email = $_POST['email'];
$new_pass = $_POST['password'];

// إذا كانت كلمة المرور فارغة، لا نغيّرها
if (empty($new_pass)) {
    $sql = "UPDATE users SET name='$new_name', email='$new_email' WHERE email='$email'";
} else {
    $sql = "UPDATE users SET name='$new_name', email='$new_email', password='$new_pass' WHERE email='$email'";
}

if (mysqli_query($conn, $sql)) {
    // تحديث الجلسة إذا تغيّر البريد
    $_SESSION['email'] = $new_email;

    echo "<h2 style='text-align:center; color:green;'>✔ تم تحديث البيانات بنجاح</h2>";
    echo "<p style='text-align:center;'><a href='update_page.php'>العودة إلى حسابي</a></p>";
} else {
    echo "<h2 style='text-align:center; color:red;'>❌ حدث خطأ أثناء التحديث</h2>";
    echo mysqli_error($conn);
}
?>
