<?php
session_start();// 啟用 Session 才能核發登入狀態

// 接收表單傳來的帳密 (使用 ?? '' 避免沒傳值時報錯)
$uID = $_POST['uName'] ?? '';
$uPwd = $_POST['uPwd'] ?? '';

// STEP1: 連線資料庫
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱

 $dbname = 'school';
 
if ( !mysqli_select_db($link, $dbname) )
   die("無法開啟 $dbname 資料庫!<br/>");
else
   echo "資料庫: $dbname 開啟成功!<br/>";

// STEP2: 去資料庫 admin 表格尋找有沒有這組帳密
$sql = "SELECT * FROM admin WHERE id='$uID' and pwd='$uPwd'";

// STEP3: 執行查詢
$result=mysqli_query($link, $sql);

// STEP4: 嘗試把結果抓出來，如果 $row 有東西代表帳密正確
$row = mysqli_fetch_assoc($result); 
if($row){
    // 登入成功：設定 Session 通行證，並寫入 Cookie 記住帳號
    $_SESSION['login']='admin';// (這份程式碼架構判斷通過皆設為 user)
    setcookie('uName',$uID,time()+3600);// 存活一小時
    header("Location:success.php");// 跳轉到成功頁面
    exit;
}else{
    // 登入失敗
    header("Refresh:2;url=index.php");
    echo"登入失敗";
    exit;
}

// STEP5: 關閉連線
mysqli_close($link);

?>