<?php
// 必須先呼叫 session_start() 才能使用 $_SESSION 變數
session_start(); 

// 預設正確的帳號與密碼（實務上通常會從資料庫撈取）
$correct_user = "123";
$correct_pass = "123";

// 接收來自 login.php 表單 POST 過來的帳號與密碼
$input_user = $_POST["username"];
$input_pass = $_POST["password"];

// 判斷輸入的帳密是否與預設相符
if ($input_user == $correct_user && $input_pass == $correct_pass) {
    // 【登入成功】
    // 註冊 Session 變數，標記使用者已登入，並記錄使用者名稱
    $_SESSION["is_login"] = true;
    $_SESSION["user"] = $input_user;
    
    // 使用 header 函數將網頁重新導向到報名表頁面
    header("Location:a1123335_葉庭佑_作業1.php");
    exit;
} else {
    // 【登入失敗】
    // 輸出一段 JavaScript 程式碼，跳出警告視窗並將畫面導回 login.php
    echo "<script>
            alert('帳號或密碼錯誤，請重新登入！');
            window.location.href = 'login.php';
          </script>";
    exit;
}
?>