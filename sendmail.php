<?php
// ヘッダーの設定（文字化けを防ぐため）
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// フォームから送信されたデータを受け取る
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// フォームの入力内容を整形
$body = "お名前: " . $name . "\n";
$body .= "メールアドレス: " . $email . "\n";
$body .= "件名: " . $subject . "\n";
$body .= "お問い合わせ内容: " . $message . "\n";

// 送信先のメールアドレス
$to = 'kosake@naginoki-root.com'; 

// 件名
$mail_subject = 'ホームページからのお問い合わせ: ' . $subject;

// メール送信
if (mb_send_mail($to, $mail_subject, $body, "From: $email")) {
    // 送信成功時の処理
    header('Location: thanks.html'); // 送信完了ページにリダイレクト
    exit;
} else {
    // 送信失敗時の処理
    echo "メールの送信に失敗しました。";
}
?>