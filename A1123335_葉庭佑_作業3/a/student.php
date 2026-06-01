<?php
session_start();// 要讀取 $_SESSION 必須先啟動


// 【考試重點】權限檢查 (Session 控制)
// 必須同時滿足兩個條件：1. Session 有設定  2. Session 的值是 'user'
if(isset($_SESSION['login']) && $_SESSION['login'] == 'user'){
    echo "<h1>學生Login Success</h1>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    // 若沒有 Session 或身分不對，代表是非法闖入
    echo "<h1>非法進入，三秒後回首頁</h1>";
    header("Refresh:3;url=index.php");
    exit;
}
?>