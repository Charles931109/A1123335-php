<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>系統登入</title>
</head>
<body>
    <h1>請先登入</h1>
    <form action="loginCheck.php" method="post">
        帳號：<input type="text" name="username" required><br><br>
        密碼：<input type="password" name="password" required><br><br>
        <input type="submit" value="登入">
    </form>
</body>
</html>