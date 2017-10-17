<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_test";

$cn = mysqli_connect($servername,$username,$password);
$db = mysqli_select_db($cn,$dbname);
if(!$db)
	echo "fail to connect db";
// else{
// 	echo "Succeeded to connect db";
// }

/* change character set to utf8 */
if (!$cn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $cn->error);
    exit();
}