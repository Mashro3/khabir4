<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // إضافة المستخدم
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email,password, $role);

    if ($stmt->execute()) {

        echo "<script>
                alert('✔ تم التسجيل بنجاح');
                window.location.href='index.html';
              </script>";

    } else {
        echo "<script>alert('❌ البريد مستخدم مسبقاً');</script>";
    }
}
?>
