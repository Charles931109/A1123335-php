<?php
// 接收 update.php 傳來的「新資料」與「隱藏的學生編號」
$sName=$_POST['sName'];
$sDept=$_POST['sDept'];
$sCity=$_POST['sCity'];
$sNo=$_POST['sNo'];

// STEP1: 連線
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱

// STEP2: 準備更新指令 (把 SET 後面的欄位改成表單傳來的新變數)
$sql="UPDATE student SET name='$sName', dept='$sDept', city='$sCity' WHERE No='$sNo'";

// STEP3: 執行指令
if($result=mysqli_query($link,$sql)){
    header("Refresh:0;url=showStudent.php");// 更新成功，跳回列表
    exit;
}else{
    echo"更新失敗";
}
// STEP5: 關閉連線
mysqli_close($link);
?>