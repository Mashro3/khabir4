<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, name, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name']    = $row['name'];
            $_SESSION['role']    = $row['role'];

            echo "<script>
                    alert('✔ تم تسجيل الدخول بنجاح');
                    window.location.href='index.html';
                  </script>";
            exit();

        } else {
            echo "<script>alert('❌ كلمة المرور غير صحيحة');history.back();</script>";
        }

    } else {
        echo "<script>alert('❌ البريد غير مسجل');history.back();</script>";
    }
}
?>
