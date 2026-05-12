<?php
$conn = new mysqli("localhost", "root", "", "khabir");

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        echo "success";
    } else {
        echo "wrong_password";
    }
} else {
    echo "not_found";
}

$conn->close();
?>
