<?php

include ('line-bot.php');

$channelSecret = '0d39897911dcf7e20f94e714c59d3fc3';
$access_token  = 'EHGZnJh9TWJUMsFAop/DyUlwV0CXWzXCaYN58PRJ9aqaUOAGgeCSgJ7GAPm855/j8SOmPr/TP8hD2VpRXd+3dNIbBL+GFN7AW0C3jH0A3NtreLFu0fIdNq8FqHZiQTK/SWVRkEfoIQ62t0/nu7FH3AdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
	
    // $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));
    $bot->replyMessageNew($bot->replyToken, $bot->message->type);

    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
else{
    // echo 'Connect Succeeded!';
    include ('verify.php');
}
