<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    echo "<h1>歡迎管理者登入</h1>";
    echo "這裡是管理者頁面，你可以進行後台管理。<br/>";
    echo "<a href='logout.php'>登出</a>";
} else {
    echo "<h1>非法進入，三秒後回首頁</h1>";
    header("Refresh:3;url=index.php");
}
?>