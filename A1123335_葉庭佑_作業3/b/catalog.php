<?php
// 【考試重點】只要用到 $_SESSION，檔案的第一行絕對要是 session_start();
session_start();

// 檢查使用者是不是按了「訂購」按鈕送出表單過來的 (確認請求方法是否為 POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 把表單傳來的商品代號 (Item) 和數量 (Quantity) 存進 Session 變數中當作暫存
    // $_POST['Item'] 對應下方 <select name="Item">
    // $_POST['Quantity'] 對應下方 <input name="Quantity">
    $_SESSION['Item'] = $_POST['Item'];
    $_SESSION['Quantity'] = $_POST['Quantity'];
    
    // 資料存進 Session 後，立刻叫瀏覽器「轉址(跳轉)」去 savecart.php 進行下一步
    header("Location: savecart.php");
    
    // 【考試重點】header 轉址完後面一定要加 exit;，讓程式停在這裡不要往下跑，避免出錯
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品目錄</title>
</head>
<body> <form action="catalog.php" method="POST">
        選擇商品：
        <select name="Item">
            <option value="a">ipad - 15000元</option>
            <option value="b">mac - 30000元</option>
            <option value="c">iPhone - 20000元</option>
        </select>
        <input type="text" name="Quantity" value="1" size="3">
        <input type="submit" value="訂購">
    </form>
    <hr>
    <a href="catalog.php">商品目錄</a> <a href="shoppingcart.php">檢視購物車</a>
</body>
</html>