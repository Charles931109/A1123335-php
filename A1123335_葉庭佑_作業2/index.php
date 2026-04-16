<?php
session_start();

// 處理登入表單提交
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    // 使用 Session 儲存角色資訊
    $_SESSION['role'] = $role;

    // 使用 Cookie 儲存使用者 ID，設定存活時間為 1 小時 (3600秒)
    setcookie("user_id", $user_id, time() + 3600, "/");

    // 導向儀表板
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>系統登入</title>
</head>
<body>
    <h1>系統登入</h1>
    <form method="POST" action="index.php">
        <label>使用者 ID：</label>
        <input type="text" name="user_id" required><br><br>
        
        <label>選擇角色：</label>
        <select name="role">
            <option value="student">學生</option>
            <option value="teacher">教師</option>
            <option value="admin">管理者</option>
        </select><br><br>
        
        <button type="submit">登入</button>
    </form>
</body>
</html>