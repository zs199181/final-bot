<?php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '	
4c6b31ffceb1b59b3c93ac27345062f8';
$access_token  = '1fv4VHaVDl8Me9nQlLF3UUbLjPOdiR/G405XuGQ5qtqxlX4e3ka8r6v6N2Q6Qm693qnMwLv/2dQdNRiJ6vCGMc2ea6is/Lofj2vvB/OwYgN81xpbRwr0FIVE6fsuGxriuO3nFP1HefTB5Xo65XiiUAdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('U9e0920885592118c68d68f65761d9c3f', 'Hello World !!');

if ($bot->isSuccess()) {
    echo 'Succeeded!';
    exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
