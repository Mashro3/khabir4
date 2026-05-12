<?php
// استلام السؤال من الصفحة
$question = $_POST['question'] ?? '';

if (!$question) {
    echo "لم يصل أي سؤال.";
    exit;
}

// هنا المفروض تتصلين بخدمة ذكاء اصطناعي حقيقية (API)
// الكود التالي مجرد مثال هيكل، تحتاجين تبدلينه بمزود فعلي

// مثال شكلي فقط:
$apiKey = "ضعـي_هنا_مفتاح_API_الخدمة_اللي_تستخدمينها";
$endpoint = "https://example-ai-service.com/chat"; // عنوان خدمة الذكاء

// طلب إلى خدمة الذكاء (هذا مثال عام، يختلف حسب المزود)
$data = [
    "model" => "gpt-like-model",
    "messages" => [
        ["role" => "user", "content" => $question]
    ]
];

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $apiKey
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "خطأ في الاتصال بخدمة الذكاء الاصطناعي.";
    exit;
}
curl_close($ch);

// هنا تحتاجين تفكين JSON حسب شكل استجابة المزود
// هذا مثال عام:
$resData = json_decode($response, true);
$answer = $resData['choices'][0]['message']['content'] ?? "لم أستطع توليد إجابة.";

// نرجع الإجابة للصفحة
echo $answer;
