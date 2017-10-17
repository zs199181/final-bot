<?php

include ('line-bot.php');

$channelSecret = '0d39897911dcf7e20f94e714c59d3fc3';
$access_token  = 'EHGZnJh9TWJUMsFAop/DyUlwV0CXWzXCaYN58PRJ9aqaUOAGgeCSgJ7GAPm855/j8SOmPr/TP8hD2VpRXd+3dNIbBL+GFN7AW0C3jH0A3NtreLFu0fIdNq8FqHZiQTK/SWVRkEfoIQ62t0/nu7FH3AdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);

if (!empty($bot->isEvents)) {
$bot->replyMessageNew($bot->replyToken, "111");

	include('connect.php');
	$input = $bot->message->text;
	$mode = $input[0];
	$rest = substr($input, 1);
$bot->replyMessageNew($bot->replyToken, $rest);
	if($mode == '1') {
		$sql = "SELECT tel FROM user Where name ='".$rest."'";
		$bot->replyMessageNew($bot->replyToken, $sql);
		$result = mysqli_query($cn,$sql);
		while($row = mysqli_fetch_array($result)) {
			// echo $row['tel'];
			$bot->replyMessageNew($bot->replyToken, $row['tel']);
		}
	}
	elseif ($mode == '2') {
		$sql = "SELECT name FROM user Where tel ='".$rest."'";
		$result = mysqli_query($cn,$sql);
		while($row = mysqli_fetch_array($result)) {
			// echo $row['name'];
			$bot->replyMessageNew($bot->replyToken, $row['name']);
		}
	}
	mysqli_close($cn);

	if ($bot->isSuccess()) {
	    echo 'Succeeded!';
	    exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();
}
else {
	echo 'bot event is empty';
}