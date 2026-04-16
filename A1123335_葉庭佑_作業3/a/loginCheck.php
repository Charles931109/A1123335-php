<?php
session_start();


$fID = "admin"; 
$fPWD = "123";

$teacherID = "teacher"; 
$teacherPWD = "567";

$adminID = "admin"; 
$adminPWD = "1234";

$uID = $_POST['uName'];
$uPwd = $_POST['uPwd'];

if ($uID == $fID && $uPwd == $fPWD) {
    $_SESSION['login'] = 'user'; 
    setcookie('uName', $uID, time() + 3600); 
    header("Location: success.php");
    exit;
} elseif ($uID == $teacherID && $uPwd == $teacherPWD) {
    $_SESSION['login'] = 'teacher';
    setcookie('uName', $uID, time() + 3600); 
    header("Location: teacher.php");
    exit;
} elseif ($uID == $adminID && $uPwd == $adminPWD) {
    $_SESSION['login'] = 'admin';
    setcookie('uName', $uID, time() + 3600); 
    header("Location: admin.php");
    exit;
} else {
    echo "登入失敗，兩秒後跳回登入頁面";
    header("Refresh:2;url=index.php");
    exit;
}
?>