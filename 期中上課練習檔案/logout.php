<?php
session_start();

session_destroy();//用 session_destroy(); 把伺服器端的 Session 通行證銷毀。
header("Refresh:0;url=index.php");
?>