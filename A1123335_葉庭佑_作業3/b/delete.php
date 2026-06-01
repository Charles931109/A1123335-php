<?php
// 要讀取剛才 catalog.php 存的 Session，所以第一行也要 session_start();
session_start();

// isset() 是用來檢查變數「是否存在」。
// 這裡檢查：如果 Session 裡面真的有 Item 和 Quantity 的資料，才執行大括號裡面的動作
if (isset($_SESSION['Item']) && isset($_SESSION['Quantity'])) {
    
    // 把 Session 裡的值拿出來，裝進比較短的變數 $id 和 $qty 裡面方便操作
    $id = $_SESSION['Item'];
    $qty = $_SESSION['Quantity'];
    
    // 【超級大重點】建立「陣列 Cookie」
    // 名稱：cart[$id] (例如：cart[a]、cart[b])
    // 值：$qty (使用者輸入的數量)
    // 存活時間：time() + 3600 (代表從現在起算，存活 3600 秒 = 1 小時)
    setcookie("cart[" . $id . "]", $qty, time() + 3600);
    
    // 既然已經把資料安全地存進 Cookie 了，剛才當作暫存的 Session 就可以清掉了
    unset($_SESSION['Item']);
    unset($_SESSION['Quantity']);
}

// 處理完畢，轉址到購物車頁面讓使用者看結果
header("Location: shoppingcart.php");
exit;
?>