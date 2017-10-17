<?php

include ('line-bot.php');

$channelSecret = '0d39897911dcf7e20f94e714c59d3fc3';
$access_token  = 'EHGZnJh9TWJUMsFAop/DyUlwV0CXWzXCaYN58PRJ9aqaUOAGgeCSgJ7GAPm855/j8SOmPr/TP8hD2VpRXd+3dNIbBL+GFN7AW0C3jH0A3NtreLFu0fIdNq8FqHZiQTK/SWVRkEfoIQ62t0/nu7FH3AdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
	// $input = $bot->message->text;
	// echo $input;
	$input = 'image';
	if ($input == 'image') {
		// $bot->replyImagemapMessage($bot->replyToken, $bot->message->type);
		// $bot->replyImageMessage($bot->replyToken);
		$bot->replyImagemapMessage($bot->replyToken);
		var_dump($bot);
	}
	// echo "jean";
    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
else {
	echo 'bot event is empty';
}