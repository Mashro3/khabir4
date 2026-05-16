<?php
session_start();
include "db.php";

// التحقق من تسجيل الدخول
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email'];

// جلب بيانات المستخدم
$query = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بيانات الحساب</title>
    <style>
        body {
            font-family: "Cairo";
            background: url("background.jpg") no-repeat center center fixed;
            background-size: cover;
            text-align: center;
            padding: 40px;
        }
        .box {
            background: white;
            width: 400px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .info {
            font-size: 18px;
            margin: 10px 0;
        }
        a {
            display: block;
            margin-top: 20px;
            background: #2e7d32;
            color: white;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>بيانات حسابك</h2>

    <div class="info">الاسم: <?php echo $user['name']; ?></div>
    <div class="info">البريد: <?php echo $user['email']; ?></div>

    <a href="update_page.php">تعديل البيانات</a>
</div>

</body>
</html>
