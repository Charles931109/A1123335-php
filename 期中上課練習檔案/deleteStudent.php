<?php
// 接收網址列傳來的學生編號 (因為是附在網址後面 ?sNo=...，所以要用 GET)
$sNo=$_GET['sNo'];

// STEP1: 連線資料庫
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱

// STEP2: 準備刪除指令 (務必加上 WHERE 條件，否則會刪除全班資料)
$sql="DELETE FROM student WHERE No='$sNo'";

// STEP3: 執行刪除指令
if($result=mysqli_query($link,$sql)){
    header("Refresh:0;url=showStudent.php");
    exit;
}else{
    echo"刪除失敗";
}

// STEP5: 關閉連線
mysqli_close($link);
?>
