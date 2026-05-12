<?php

// استلام السؤال من صفحة المرشد
$question = $_POST['question'] ?? '';

if (!$question) {
    echo "لم يصل أي سؤال.";
    exit;
}

/*
===========================================
    🔥 إعدادات الذكاء الاصطناعي (API)
===========================================
*/

// ضعي مفتاح API الخاص بك هنا
$apiKey = "YOUR_API_KEY_HERE";

// عنوان خدمة الذكاء الاصطناعي
$endpoint = "https://api.openai.com/v1/chat/completions";

// البيانات التي سيتم إرسالها للنموذج
$data = [
    "model" => "gpt-3.5-turbo",   // يمكنك تغييره حسب الخدمة
    "messages" => [
        ["role" => "system", "content" => "أنت مرشد ذكي تشرح بإسلوب بسيط وواضح."],
        ["role" => "user", "content" => $question]
    ],
    "temperature" => 0.7
];

// تجهيز الاتصال
$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $apiKey
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// تنفيذ الطلب
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "خطأ في الاتصال بخدمة الذكاء الاصطناعي.";
    exit;
}

curl_close($ch);

// تحليل الرد
$resData = json_decode($response, true);

// استخراج الإجابة
$answer = $resData['choices'][0]['message']['content'] ?? "لم أستطع توليد إجابة.";

// إرجاع الإجابة للصفحة
echo $answer;

?>
