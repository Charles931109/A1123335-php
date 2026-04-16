<?php
session_start();

if (isset($_SESSION['Item']) && isset($_SESSION['Quantity'])) {
    $id = $_SESSION['Item'];
    $qty = $_SESSION['Quantity'];
    setcookie("cart[" . $id . "]", $qty, time() + 3600);
    unset($_SESSION['Item']);
    unset($_SESSION['Quantity']);
}
header("Location: shoppingcart.php");
exit;
?>