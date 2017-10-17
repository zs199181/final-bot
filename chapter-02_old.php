<?php

include ('line-bot.php');

$channelSecret = '	
4c6b31ffceb1b59b3c93ac27345062f8';
$access_token  = '1fv4VHaVDl8Me9nQlLF3UUbLjPOdiR/G405XuGQ5qtqxlX4e3ka8r6v6N2Q6Qm693qnMwLv/2dQdNRiJ6vCGMc2ea6is/Lofj2vvB/OwYgN81xpbRwr0FIVE6fsuGxriuO3nFP1HefTB5Xo65XiiUAdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);

if (!empty($bot->isEvents)) {

	include('connect.php');
	$input = $bot->message->text;
	$mode = $input[0];
	$rest = substr($input, 1);
	if($mode == '1') {
		$sql = "SELECT tel FROM user Where name ='".$rest."'";
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