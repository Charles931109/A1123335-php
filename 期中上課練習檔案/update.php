<?php
// 接收網址列傳來的學生編號 (GET)
$sNo=$_GET['sNo'];

// STEP1: 連線
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱

// STEP2: 用編號去資料庫把這位學生的「舊資料」撈出來
$sql="SELECT* FROM student WHERE No='$sNo'" ;

// STEP3: 執行查詢並把那「唯一一筆」資料轉成陣列 $row
$result=mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>


<form action='updateExc.php' method='post'>
學生姓名:<input type = 'text' name='sName'value='<?php echo $row['name'];?>'><br/>
系所:<input type = 'text' name='sDept'value='<?php echo $row['dept'];?>'><br/>
城市:<input type = 'text' name='sCity'value='<?php echo $row['city'];?>'><br/>
<input type = 'hidden' name='sNo'value='<?php echo $row['No'];?>'>
<input type = 'submit'>
</form>


<?php
// STEP5: 關閉連線
mysqli_close($link);
?>
