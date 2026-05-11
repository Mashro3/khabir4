<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>حسابي | منصة خبير</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #F8F9FA;
        }

        /* الهيدر */
        header {
            background: #ffffff;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #FFD700;
        }

        header img {
            height: 60px;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #1B4332;
            font-weight: bold;
        }

        /* صندوق الحساب */
        .profile-box {
            width: 380px;
            margin: 60px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #FFD700;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .profile-box h2 {
            text-align: center;
            color: #1B4332;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .profile-box label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #1B4332;
        }

        .profile-box input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .update-btn {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #FFD700;
            color: #1B4332;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .update-btn:hover {
            background: #e6c200;
        }
    </style>
</head>

<body>

    <!-- الهيدر -->
    <header>
        <img src="logo.jpg" alt="شعار خبير">
        <nav>
            <a href="index.html">الرئيسية</a>
            <a href="kabear8.html">المرشدون</a>
            <a href="khabir2.html">الدروس</a>
            <a href="update_page.html" class="active">حسابي</a>
        </nav>
    </header>

    <!-- صندوق الحساب -->
    <div class="profile-box">

        <h2>البيانات الشخصية</h2>

        <label>اسم المستخدم</label>
        <input type="text" placeholder="اكتب اسمك الجديد">

        <label>البريد الإلكتروني</label>
        <input type="email" placeholder="example@email.com">

        <label>كلمة المرور</label>
        <input type="password" placeholder="********">

        <button class="update-btn">تحديث البيانات</button>

    </div>

</body>
</html>
