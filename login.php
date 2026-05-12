<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // جلب المستخدم
    $stmt = $conn->prepare("SELECT id, password, login_count FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();

        // مقارنة كلمة المرور (بدون تشفير)
        if ($password === $row['password']) {

            // تحديث عدد مرات الدخول
            $new_count = $row['login_count'] + 1;
            $update = $conn->prepare("UPDATE users SET login_count = ? WHERE id = ?");
            $update->bind_param("ii", $new_count, $row['id']);
            $update->execute();

            // حفظ الجلسة
            $_SESSION['email'] = $email;

            // رسالة نجاح + تحويل للصفحة الرئيسية
            echo "<script>
                    alert('✔ تم تسجيل الدخول بنجاح');
                    window.location.href='index.html';
                  </script>";
            exit();

        } else {
            echo "<h3 style='color:red; text-align:center; margin-top:40px;'>❌ كلمة المرور غير صحيحة</h3>";
        }

    } else {
        echo "<h3 style='color:red; text-align:center; margin-top:40px;'>❌ البريد غير موجود</h3>";
    }
}
?>
