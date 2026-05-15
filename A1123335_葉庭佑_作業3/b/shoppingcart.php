<?php
// 這是一個二維陣列，用來當作「假資料庫」。
// 把代號 (a, b, c) 對應到真實的「名稱」和「價格」
// 【考題預測】如果你在 catalog.php 新增了 d 商品，這裡也要記得補上 d 的資料！
$products = [
    "a" => ["name" => "ipad", "price" => 15000],
    "b" => ["name" => "mac", "price" => 30000],
    "c" => ["name" => "iPhone", "price" => 20000]
];

// 先設定一個變數用來裝「總金額」，預設為 0
$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>檢視購物車</title>
</head>
<body> 
    <table border="1"> 
        <tr>
            <th>功能</th><th>編號</th><th>名稱</th><th>價格</th><th>數量</th>
        </tr>
        
        <?php
        // 檢查名為 cart 的 Cookie 是否存在，而且它必須是一個「陣列 (is_array)」
        if (isset($_COOKIE['cart']) && is_array($_COOKIE['cart'])) {
            
            // 用 foreach 迴圈把 cart 陣列裡面的東西一個一個抓出來
            // $id 是商品代號(例如 a)，$qty 是數量
            foreach ($_COOKIE['cart'] as $id => $qty) {
                
                // 檢查這個 $id 有沒有在我們最上面定義的 $products 裡面
                if (isset($products[$id])) {
                    
                    // 從 $products 陣列中抓出這項商品的名稱和價格
                    $name = $products[$id]['name'];
                    $price = $products[$id]['price'];
                    
                    // 計算小計 (單價 * 數量)
                    $subtotal = $price * $qty;
                    
                    // 把小計累加到總金額 $total 裡面 (這行等於 $total = $total + $subtotal)
                    $total += $subtotal; 
                    
                    // 開始印出表格的一列 (<tr> 代表橫列，<td> 代表直行欄位)
                    echo "<tr>";
                    
                    // 【考試重點】刪除按鈕！利用 GET 方法把 id 放在網址後面傳給 delete.php (例如 delete.php?id=a)
                    echo "<td><a href='delete.php?id=" . htmlspecialchars($id) . "'>刪除</a></td>";
                    
                    // 印出商品編號、名稱、單價、數量
                    // htmlspecialchars() 是一種資安防護，防止印出惡意程式碼，考試時照抄就對了
                    echo "<td>" . htmlspecialchars($id) . "</td>";
                    echo "<td>" . htmlspecialchars($name) . "</td>";
                    echo "<td>" . $price . "</td>";
                    echo "<td>" . htmlspecialchars($qty) . "</td>";
                    echo "</tr>";
                }
            }
        } else {
            // 如果 Cookie 不存在，或者不是陣列，代表購物車沒東西
            // colspan='5' 代表這一格要橫跨 5 個欄位的寬度
            echo "<tr><td colspan='5' align='center'>購物車目前是空的</td></tr>";
        }
        ?>
        
        <tr>
            <td colspan="5" align="center" style="color: black;">
                總金額 = <?php echo $total; ?>元
            </td>
        </tr>
    </table>
    <br>
    <a href="catalog.php">商品目錄</a> <a href="shoppingcart.php">檢視購物車</a>
</body>
</html>