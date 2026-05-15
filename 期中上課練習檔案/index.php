<?php
session_start();

if(isset($_COOKIE['uName'])){
    echo $_COOKIE['uName']."歡迎光臨";
    echo "<a href='cookieDEL.php'>刪除COOKIE</a>";
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