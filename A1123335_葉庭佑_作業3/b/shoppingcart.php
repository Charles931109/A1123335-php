<?php
// 這裡的資料已經幫你同步成與 catalog.php 一樣的名稱和價格
$products = [
    "a" => ["name" => "ipad", "price" => 15000],
    "b" => ["name" => "mac", "price" => 30000],
    "c" => ["name" => "iPhone", "price" => 20000]
];
$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>檢視購物車</title>
</head>
<body> <table border="1"> <tr>
            <th>功能</th><th>編號</th><th>名稱</th><th>價格</th><th>數量</th>
        </tr>
        
        <?php
        if (isset($_COOKIE['cart']) && is_array($_COOKIE['cart'])) {
            foreach ($_COOKIE['cart'] as $id => $qty) {
                if (isset($products[$id])) {
                    $name = $products[$id]['name'];
                    $price = $products[$id]['price'];
                    $subtotal = $price * $qty;
                    $total += $subtotal; 
                    echo "<tr>";
                    echo "<td><a href='delete.php?id=" . htmlspecialchars($id) . "'>刪除</a></td>";
                    echo "<td>" . htmlspecialchars($id) . "</td>";
                    echo "<td>" . htmlspecialchars($name) . "</td>";
                    echo "<td>" . $price . "</td>";
                    echo "<td>" . htmlspecialchars($qty) . "</td>";
                    echo "</tr>";
                }
            }
        } else {
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