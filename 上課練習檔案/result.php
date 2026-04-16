<?php

$nName = $_POST["nName"] ??'';
$nPass = $_POST["nPassword"]??'';
$nGender = $_POST["nGender"]??'';
$nCity = $_POST["nCity"]??'';
$nDate = $_POST["nDate"]??'';
$nTime = $_POST["nTime"]??'';
$nColor = $_POST["nColor"]??'';
$comment = $_POST["nComment"]??'';

echo "Your name is:" . htmlspecialchars($nName) . "<br/>";
echo "Your Password is:" . htmlspecialchars($nPass) . "<br/>";

if ($nGender == "m") {
    echo "Your gender is: 男性<br/>";
} else {
    echo "Your gender is: 女性<br/>";
}

echo "你的興趣是: ";
if (isset($_POST["nInterest"])) {
    $nInterest = $_POST["nInterest"];
    foreach ($nInterest as $nI2) {
        switch ($nI2) {
            case "swim":
                echo "游泳 ";
                break;
            case "novel":
                echo "看小說 ";
                break;
            case "sleep":
                echo "睡覺 ";
                break;
        }
    }
} else {
    echo "無";
}
echo "<br/>";

echo "你住的城市是:" . $nCity . "<br/>";
echo "日期時間:" . $nDate . " " . $nTime . "<br/>";
echo "你選的顏色是:<span style='color:" . $nColor . "'>這個顏色</span> " . $nColor . "<br/>";

echo "你的意見:<br/>";
echo nl2br(strip_tags($comment));

echo "<hr>";
echo "<h3><a href='login.php'>點擊這裡前往登入頁面</a></h3>";
?>