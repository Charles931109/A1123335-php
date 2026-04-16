<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'teacher'){
    echo "<h1>老師好</h1>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<h1>非法進入，三秒後回首頁</h1>";
    header("Refresh:3;url=index.php");
    exit;
}
?>