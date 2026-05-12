<?php

// استلام السؤال من صفحة المرشد
$question = $_POST['question'] ?? '';

if (!$question) {
    echo "لم يصل أي سؤال.";
    exit;
}

/*
===========================================
    🔥 إعدادات Google Gemini API
===========================================
*/

// ضعي مفتاح Gemini API هنا
$apiKey = "YOUR_GEMINI_API_KEY_HERE";

// عنوان API
$endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" . $apiKey;

// تجهيز البيانات المرسلة للنموذج
$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => $question]
            ]
        ]
    ]
];

// تجهيز الاتصال
$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// تنفيذ الطلب
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "خطأ في الاتصال بخدمة Google Gemini.";
    exit;
}

curl_close($ch);

// تحليل الرد
$resData = json_decode($response, true);

// استخراج الإجابة من Gemini
$answer = $resData['candidates'][0]['content']['parts'][0]['text'] ?? "لم أستطع توليد إجابة.";

// إرجاع الإجابة للصفحة
echo nl2br($answer);

?>
