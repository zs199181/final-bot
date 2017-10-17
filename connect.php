<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_test";
*/
///
//$servername = "172.19.10.15";
$servername = "172.19.10.104";
$username = "bot";
$password = "bot123";
$dbname = "svsop";
///

$cn = mysqli_connect($servername,$username,$password);
$db = mysqli_select_db($cn,$dbname);
if(!$db){
	echo "fail to connect db";
    $bot->replyMessageNew($bot->replyToken, "fail to connect db");
}
// else{
// 	echo "Succeeded to connect db";
// }
//$bot->replyMessageNew($bot->replyToken, "222");

/* //change character set to utf8 
if (!$cn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $cn->error);
    exit();
}	
*/
//$bot->replyMessageNew($bot->replyToken, "333");
