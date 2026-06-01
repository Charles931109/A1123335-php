<?php
session_start();
//session_destroy() 會銷毀伺服器端這個使用者的所有 Session 資料
session_destroy();
header("Location: index.php");
exit;
?>