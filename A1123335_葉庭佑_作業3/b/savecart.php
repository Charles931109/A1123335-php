<?php
// 檢查網址列 (?id=...) 有沒有傳 id 過來，有傳才執行刪除
if (isset($_GET['id'])) {
    
    // 把網址傳來的 id 存進變數 $id 裡面
    $id = $_GET['id'];
    
    // 【考試必考】如何刪除 Cookie？
    // 答案：故意再設定一次同名的 Cookie，但是把它的值清空 ("")，並且把「存活時間」設為「過去的時間 (time() - 3600)」。
    // 瀏覽器看到這個 Cookie 過期了，就會自動把它刪掉！
    setcookie("cart[" . $id . "]", "", time() - 3600);
}

// 刪除完成後，轉址回購物車頁面，讓畫面更新
header("Location: shoppingcart.php");
exit;
?>