<?php
require 'db.php';
// 引入 PHPMailer (請確認你的路徑是否與資料夾結構一致)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

header('Content-Type: application/json');
$action = $_POST['action'] ?? '';

// 1. 新增 Email 至資料庫
if ($action === 'add_email') {
    $email = $_POST['email'];
    $stmt = $pdo->prepare("INSERT INTO emails (email) VALUES (?)");
    $stmt->execute([$email]);
    echo json_encode(['status' => 'success']);
    exit;
}

// 2. 獲取所有 Email 列表
if ($action === 'get_emails') {
    $stmt = $pdo->query("SELECT * FROM emails ORDER BY id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// 3. 更新排程狀態 (延遲寄送倒數計時用)
if ($action === 'update_status') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $time = $_POST['time'] ?? null;
    $stmt = $pdo->prepare("UPDATE emails SET status = ?, target_time = ? WHERE id = ?");
    $stmt->execute([$status, $time, $id]);
    echo json_encode(['status' => 'success']);
    exit;
}

// 4. 實際執行寄送信件 (包含自訂主旨與內容)
if ($action === 'send_email') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    
    // 接收前端傳來的主旨與內容，若無則使用預設值
    $subject = $_POST['subject'] ?? '這是一封測試郵件';
    $body = $_POST['body'] ?? '你好，這是從 XAMPP 寄送的測試信件！';

    $mail = new PHPMailer(true);
    try {
        // SMTP 伺服器設定
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'charles2004119@gmail.com';  // ⚠️ 請替換為你的 Gmail
        $mail->Password   = 'jmjr nmnt caqp exws';   // ⚠️ 請替換為你的應用程式密碼
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // 寄件者與收件人設定
        $mail->setFrom('charles2004119@gmail.com', '系統通知'); // ⚠️ 請替換為你的 Gmail
        $mail->addAddress($email);

        // 信件內容設定
        $mail->isHTML(true);
        $mail->Subject = $subject; // 套用前端傳來的自訂主旨
        $mail->Body    = $body;    // 套用前端傳來的自訂內容

        $mail->send();

        // 寄送完成後更新資料庫狀態為「已寄送」
        $stmt = $pdo->prepare("UPDATE emails SET status = '已寄送', target_time = NULL WHERE id = ?");
        $stmt->execute([$id]);

        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
    }
    exit;
}
?>