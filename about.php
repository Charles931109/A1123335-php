<?php
$uName=$_POST["uName"];
$uPwd=$_POST["uPwd"];
$uEmail=$_POST["uEmail"];
$uColor=$_POST["uColor"];
$uAge=$_POST["uAge"];
$uBirth=$_POST["uBirth"];
$uLike=$_POST["uLike"];
$uSecret=$_POST["uSecret"];
$uGender=$_POST["uGender"];
$uInterest=$_POST["uInterest"];
$uCity=$_POST["uCity"];
$uComment=$_POST["uComment"];

echo "Your name is:".$uName."<br>";
echo "Your password is:".$uPwd."<br>";
echo "Your Email is:".$uEmail."<br>";
echo "Your Color is:".$uColor."<br>";
echo "Your Birthday is:".$uBirth."<br>";
echo "Your Age is:".$uAge."<br>";
echo "Your like is:".$uLike."<br>";
echo "Your Secret is:".$uSecret."<br>";
echo "Your Gender is:".$uGender."<br>";
echo "Your City is:".$uCity."<br>";

$x=count($uInterest);
if($x==0){
}else{
    for($i=0;$i<$x;$i++){
        if($i==$x-1){
            echo $uInterest[$i];
        }else{
            echo $uInterest[$i].",";
        }
    }
}
echo "<br>";
echo "Your comments:".nl2br(htmlentities($uComment));
?>