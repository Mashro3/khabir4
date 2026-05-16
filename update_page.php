
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
$query = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// عند الضغط على زر حفظ التعديلات
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $password = $_POST['password'];

    // إذا المستخدم لم يغيّر كلمة المرور، نستخدم القديمة
    if (!empty($password)) {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashed_pass = $user['password'];
    }

    $update = "UPDATE users SET name = ?, password = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sss", $name, $hashed_pass, $email);
if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('تم تحديث البيانات بنجاح');
        window.location.href='index.html'; 
    </script>";
} else {
    echo "<script>alert('حدث خطأ أثناء التحديث');</script>";
}
 

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تحديث البيانات</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            direction: rtl;
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
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #aaa;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 95%;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>تحديث بيانات الحساب</h2>

    <form method="POST">

        <label>الاسم:</label><br>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>

        <label>البريد الإلكتروني:</label><br>
        <input type="text" value="<?php echo $user['email']; ?>" disabled>

        <label>كلمة المرور الجديدة (اختياري):</label><br>
        <input type="password" name="password" placeholder="اتركه فارغًا إذا لا تريد التغيير">

        <button type="submit">حفظ التعديلات</button>
    </form>
</div>

</body>
</html>
