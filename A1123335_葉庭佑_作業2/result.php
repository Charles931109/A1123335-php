<?php
session_start();
// 一樣要做權限檢查，防止別人直接輸入網址進來這頁
if (!isset($_SESSION["is_login"]) || $_SESSION["is_login"] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>報名結果</title>
</head>
<body>
    <h1>報名成功以下是報名資訊：</h1>
    <ul>
        <li><strong>姓名：</strong> <?php echo $_POST["uName"]; ?></li>
        <li><strong>性別：</strong> <?php echo $_POST["mGender"]; ?></li>
        <li><strong>飲食習慣：</strong> 
            <?php 
               // 檢查是否真的有勾選 diet（如果都沒勾，$_POST["diet"] 會不存在，直接讀會報錯）
                if (isset($_POST["diet"])) {
                    // diet 是一個陣列，用 implode() 可以把陣列元素用 "、" 串接成一個字串
                    $diet_str = implode("、", $_POST["diet"]);
                    echo implode("、", $_POST["diet"]);
                } else {
                    echo "無特別勾選";
                }
            ?>
        </li>
        <li><strong>報名梯次：</strong> <?php echo $_POST["nSession"]; ?></li>
        <li><strong>出生日期：</strong> <?php echo $_POST["uBirth"]; ?></li>
        <li><strong>聯絡信箱：</strong> <?php echo $_POST["uEmail"]; ?></li>
        <li><strong>備註事項：</strong> <br>
            <?php // nl2br() 可以將 textarea 輸入時的「換行符號(\n)」轉換為 HTML 的 <br> 標籤，讓網頁能正確換行
                echo nl2br(htmlspecialchars($_POST["comment"])); 
            ?>
        </li>
    </ul>

    <a href="login.php">回首頁</a>
</body>
</html>