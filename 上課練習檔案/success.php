<?php
session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login']=='user'){
        echo"<h1>Login success</h1>";
        echo "<a href='logout.php'>Logout</a>";
    }else{
        echo"<h1>非法進入，三秒後回首頁</h1>";
        header("Refresh:3;url=index.php");
    }
}else{
    echo"<h1>非法進入，三秒後回首頁</h1>";
    header("Refresh:3;url=index.php");
}

?>
