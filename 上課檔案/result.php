<?php

$nName = $_POST["nName"];
$nPass = $_POST["nPassword"];
$nGender = $_POST["nGender"];
$nInterest = $_POST["nInterest"];
$nCity = $_POST["nCity"];
$nDate = $_POST["nDate"];
$nTime = $_POST["nTime"];
$nColor = $_POST["nColor"];
$comment = $_POST["nComment"];

echo "Your name is:" . $_POST["nName"] . "<br/>";
$nPass = $_POST["nPassword"];

echo "Your Password is:" . $nPass . "<br/>";

if ($nGender == "m") {
    echo "your gender is 男性<br/>";
} else {
    echo "your gender is 女生<br/>";

}

echo "Your Gender is:" . $nGender . "<br/>";



echo "你的興趣是:";
foreach ($nInterest as $nI2) {
    switch ($nI2) {
        case "swim":
            echo "游泳";
            break;
        case "novel":
            echo "看小說";
            break;
        case "sleep":
            echo "睡覺";
            break;

    }
}

echo "你住的城市是:" . $nCity . "<br/>";
echo "日期時間:" . $nDate . "-" . $nTime . "<br/>";
echo "<br/>";
echo "你選的顏色是:<font color=" . $nColor . ">這個顏色</font>" . $nColor . "<br/>";

echo "你的意見:<br/>";
echo strip_tags(nl2br($comment));

echo "<hr>";
echo "<h3><a href='login.php'>點擊這裡前往登入頁面</a></h3>";
?>


<html>

你的密碼是:<?php echo $nPass ?>