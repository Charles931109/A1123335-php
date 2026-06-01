<?php
// 考試重點：只要用到 $_SESSION，檔案的第一行一定要有 session_start()
session_start();

// 需求 3：檢查並顯示 Cookie
// isset() 函數用來檢查變數是否有設定而且不是 NULL
if(isset($_COOKIE['uName'])){
    // 顯示 Cookie 內儲存的使用者 ID
    echo "緩光臨，您的ID是：" . $_COOKIE['uName'] . " ";
    // 提供刪除 Cookie 的連結，點擊後會前往 cookieDEL.php
    echo "<a href='cookieDEL.php'>刪除 COOKIE</a><br/>";
}
?>

<h1>登入系統</h1>
<form action="loginCheck.php" method="POST">
    ID: <input type="text" name="uName"><br/>
    Password: <input type="password" name="uPwd"><br/>
    <input type="submit" value="登入">
</form>

<?php
// 顯示伺服器當前時間
echo "伺服器時間: " . date("Y-m-d H:i:s", time());
?>