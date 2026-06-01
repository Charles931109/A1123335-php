// ===== 上方是 HTML 表單，用來輸入新學生資料並送給 addStudent.php =====
<form action='addStudent.php' method='post'>
學生姓名:<input type = 'text' name='sName'><br/>
系所:<input type = 'text' name='sDept'><br/>
城市:<input type = 'text' name='sCity'><br/>
<input type = 'submit'>
</form>


<?php

// STEP1: 建立資料庫連線
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱


// STEP2: 準備 SQL 指令 (撈取 student 表格所有資料)
$sql="SELECT* FROM student" ;

// STEP3: 執行 SQL 指令，並將結果存入 $result 變數
$result=mysqli_query($link, $sql);

echo"<table border='1'>";

// STEP4: 使用 while 迴圈，一筆一筆把資料抓出來 (mysqli_fetch_assoc 會把資料轉成關聯式陣列)
while( $row = mysqli_fetch_assoc($result) ){ 
    echo "<tr>";
    // 顯示資料，並利用 GET 方法 (?sNo=編號) 將該名學生的編號傳給刪除或更新的頁面
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["dept"]."</td>";
    echo "<td>".$row["city"]."</td>";
    echo "<td><a href='deleteStudent.php?sNo=".$row['No']."'>刪除</a></td>";
    echo "<td><a href='update.php?sNo=".$row['No']."'>更新</a></td>";
    echo "</tr>";
}
echo "</table>";

//STEP5 關閉資料庫連線 (釋放資源)
mysqli_close($link);
?>
