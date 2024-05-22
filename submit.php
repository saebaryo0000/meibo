<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $names = $_POST['name'];
    $emails = $_POST['email'];
    $ages = $_POST['age'];
    $genders = $_POST['gender'];
    $occupations = $_POST['occupation'];
    $nationalities = $_POST['nationality'];
    $passport_numbers = $_POST['passport_number'];
    $checkin_dates = $_POST['checkin_date'];
    $checkout_dates = $_POST['checkout_date'];
    
    // Passport files processing (example)
    $passport_files = $_FILES['passport_file'];
    
    echo "<h1>送信されたデータ</h1>";
    
    for ($i = 0; $i < count($names); $i++) {
        echo "<h2>宿泊者 " . ($i + 1) . "</h2>";
        echo "名前: " . htmlspecialchars($names[$i]) . "<br>";
        echo "メールアドレス: " . htmlspecialchars($emails[$i]) . "<br>";
        echo "年齢: " . htmlspecialchars($ages[$i]) . "<br>";
        echo "性別: " . htmlspecialchars($genders[$i]) . "<br>";
        echo "ご職業: " . htmlspecialchars($occupations[$i]) . "<br>";
        echo "国籍: " . htmlspecialchars($nationalities[$i]) . "<br>";
        echo "パスポート番号: " . htmlspecialchars($passport_numbers[$i]) . "<br>";
        echo "チェックイン日: " . htmlspecialchars($checkin_dates[$i]) . "<br>";
        echo "チェックアウト日: " . htmlspecialchars($checkout_dates[$i]) . "<br>";
        // Handle file upload
        if ($passport_files['error'][$i] == UPLOAD_ERR_OK) {
            $tmp_name = $passport_files['tmp_name'][$i];
            $name = basename($passport_files['name'][$i]);
            move_uploaded_file($tmp_name, "uploads/$name");
            echo "パスポートファイル: アップロード成功<br>";
        } else {
            echo "パスポートファイル: アップロード失敗<br>";
        }
        echo "<hr>";
    }
} else {
    echo "無効なリクエストです。";
}
?>
