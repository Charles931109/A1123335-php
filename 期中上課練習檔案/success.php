<?php
session_start(); // 要檢查 Session 前一定要先 start

// 【修正Bug】正確的寫法：檢查是否有 login 這個 Session，且它的值等於 'user'
if(isset($_SESSION['login']) && $_SESSION['login'] == 'user'){
    echo "<h1>Welcome! Login Success</h1>";
    echo "<a href='logout.php'>Logout (登出)</a>";
} else {
    // 如果沒有通行證，或者通行證不對，踢回首頁
    echo "<h1>非法進入，三秒後回首頁</h1>";
    header("Refresh:3;url=index.php");
    exit;
}
?>