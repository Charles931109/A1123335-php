<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['Item'] = $_POST['Item'];
    $_SESSION['Quantity'] = $_POST['Quantity'];
    
    header("Location: savecart.php");
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