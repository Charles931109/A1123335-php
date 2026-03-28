<?php

session_start(); 


$correct_user = "123";
$correct_pass = "123";


$input_user = $_POST["username"];
$input_pass = $_POST["password"];


if ($input_user == $correct_user && $input_pass == $correct_pass) {
    
    $_SESSION["is_login"] = true;
    $_SESSION["user"] = $input_user;
    
    
    header("Location:a1123335_葉庭佑_作業1.php");
    exit;
} else {
    
    echo "<script>
            alert('帳號或密碼錯誤，請重新登入！');
            window.location.href = 'login.php';
          </script>";
    exit;
}
?>