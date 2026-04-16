<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    echo "<h1>管理者後台</h1>";
    echo "<a href='logout.php'>登出</a>";
} else {
    echo "<h1>非法進入，三秒後回首頁</h1>";
    header("Refresh:3;url=index.php");
    exit;
}
?>