<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "khabir4"; // ← مهم جدًا

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>
