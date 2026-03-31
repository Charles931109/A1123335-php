<?php
session_start();
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
               
                if (isset($_POST["diet"])) {
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
            <?php echo nl2br($_POST["comment"]); ?>
        </li>
    </ul>

    <a href="login.php">回首頁</a>
</body>
</html>