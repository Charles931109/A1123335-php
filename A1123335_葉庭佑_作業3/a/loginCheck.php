<?php
session_start();

// --- 預設帳號密碼設定 ---
// 學生帳號與密碼 (已幫你修正變數名稱與帳號，避免與 admin 衝突)
$studentID = "student"; 
$studentPWD = "123";

// 老師帳號與密碼
$teacherID = "teacher"; 
$teacherPWD = "567";

// 管理員帳號與密碼
$adminID = "admin"; 
$adminPWD = "1234";

// 接收來自 index.php 表單 POST 過來的資料
$uID = $_POST['uName'];
$uPwd = $_POST['uPwd'];


// --- 需求 1 & 2 & 3：身分驗證、Session 設定、Cookie 設定 ---

// 判斷 1：是否為學生
if ($uID == $studentID && $uPwd == $studentPWD) {
    // 登入成功，將 Session 變數標記為 user 身分
    $_SESSION['login'] = 'user'; 
    
    // 【考試重點】setcookie('名稱', '值', 存活時間) 必須在輸出任何 HTML 之前呼叫！
    // time() + 3600 代表 Cookie 從現在起存活 1 小時 (3600秒)
    setcookie('uName', $uID, time() + 3600); 
    
    // header("Location: 網址") 用來將網頁重新導向
    header("Location: student.php");
    exit; // 【考試重點】使用 header 導向後，務必加上 exit，阻止後續程式碼繼續執行


    // 判斷 2：是否為老師
} elseif ($uID == $teacherID && $uPwd == $teacherPWD) {
    $_SESSION['login'] = 'teacher';
    setcookie('uName', $uID, time() + 3600); 
    header("Location: teacher.php");
    exit;

    
    // 判斷 3：是否為管理員
} elseif ($uID == $adminID && $uPwd == $adminPWD) {
    $_SESSION['login'] = 'admin';
    setcookie('uName', $uID, time() + 3600); 
    header("Location: admin.php");
    exit;

    // 登入失敗的處理
} else {
    echo "登入失敗，兩秒後跳回登入頁面";
    header("Refresh:2;url=index.php");// Refresh 可以在指定的秒數後跳轉
    exit;
}
?>