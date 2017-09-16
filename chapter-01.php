<?php

include ('line-bot.php');

$channelSecret = '12de6a97812901e6fee0a0bbab685eee';
$access_token  = 'HatdNCqxGq+BiYUUAxXYbz8Bjlx1Mx1O8tHLxim2y2cF2BuWxGxt6fIIfnudfQrdleHDBLSZtK6Ukjpt+dF6N1VcBv9PDUTuxJPCEhFCBULVTiyvv5TwTkBwzSBHUraOAcMmIMIi56OqrMsVIhra5gdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
    $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
