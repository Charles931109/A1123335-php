<?php
session_start();

if(isset($_COOKIE['uName'])){
    echo "緩光臨，您的ID是：" . $_COOKIE['uName'] . " ";
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
echo "伺服器時間: " . date("Y-m-d H:i:s", time());
?>