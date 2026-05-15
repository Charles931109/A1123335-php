<?php
// 接收 showStudent.php 傳來的表單資料 (POST 方法)
$sName=$_POST['sName'];
$sDept=$_POST['sDept'];
$sCity=$_POST['sCity'];

// STEP1: 連線資料庫
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱

// STEP2: 準備新增指令 (把變數塞進去 VALUES 裡面)
$sql="INSERT INTO student (name,dept,city) VALUES('$sName','$sDept','$sCity')" ;

// STEP3: 執行指令並判斷是否成功
if($result=mysqli_query($link,$sql)){
    // 成功的話，0秒後跳轉回學生列表頁面
    header("Refresh:0;url=showStudent.php");
    exit;// 跳轉後務必加上 exit 中斷執行
}else{
    echo"新增失敗";
}

//STEP5關閉連線
mysqli_close($link);
?>

