<?php

// 【考試重點】刪除 Cookie 的標準作法：
// 重新設定同名的 Cookie，並把有效時間設定為「過去的時間」(例如減去 3600 秒)
// 瀏覽器發現這個 Cookie 過期了，就會自動把它刪除
setcookie('uName', '', time() - 3600); 
// 刪除後導回首頁，讓首頁重新檢查狀態
header("Location: index.php");
exit;
?>