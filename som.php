<?php
include ('line-bot.php');

use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;

$channelSecret = 'a7f12662ad07579c34462f7642dfca05';
$access_token  = 'qU/XKZaEDLLmcaEzUqOEVqrrKPc2yjypAmDbp9FtHjHpHTCYjpUjxEm9H/7mKUZsC6TarVtgs9mcY1dEr2/XzRJmVFLxAU1G3vSsP8TlZI+eAKIlVKXNiStnGAkkSfEKNb/lCJ3DTLpOdPaMt9BEtQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {

	include('connect.php');
	
	$input = $bot->message->text;

	if ($input == 'KPIคณบดี') {
	    $baseUrl  = "https://binary-production.tk/bot/image/kpiMenu";
        $altText  = "KPI คณบดี";
        $baseSize = new BaseSizeBuilder(820,1040);
        $actions = [
            // new ImagemapUriActionBuilder("https://www.google.co.th/", new AreaBuilder(520,0,520,1040)),
            new ImagemapMessageActionBuilder("KPI 1", new AreaBuilder(0,0,510,260)),
            new ImagemapMessageActionBuilder("KPI 2", new AreaBuilder(530,0,510,260)),
            new ImagemapMessageActionBuilder("KPI 3", new AreaBuilder(0,280,510,260)),
            new ImagemapMessageActionBuilder("KPI 4", new AreaBuilder(530,280,510,260)),
            new ImagemapMessageActionBuilder("KPI 5", new AreaBuilder(0,300,1040,260)),
         ];
        $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);
     }
    elseif ($input == 'KPI1') {
        $baseUrl  = "https://binary-production.tk/bot/image/kpi1";
        $altText  = "KPI 1";
        $baseSize = new BaseSizeBuilder(1660,1040);
        $actions = [
            new ImagemapMessageActionBuilder("1.1", new AreaBuilder(0,0,1040,260)),
            new ImagemapMessageActionBuilder("1.2", new AreaBuilder(0,280,1040,260)),
            new ImagemapMessageActionBuilder("1.3", new AreaBuilder(0,560,1040,260)),
            new ImagemapMessageActionBuilder("1.4", new AreaBuilder(0,840,1040,260)),
            new ImagemapMessageActionBuilder("1.5", new AreaBuilder(0,1120,1040,260)),
            new ImagemapMessageActionBuilder("1.6", new AreaBuilder(0,1400,1040,260)),
        ];
        $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);
    }
    elseif($input == '1.1') { //1.1
		$bot->replyMessageNew($bot->replyToken, '76.47/92');
	}
	elseif($input == '1.2') { //1.2
		$bot->replyMessageNew($bot->replyToken, '75.60/82');
	}
	elseif($input == '1.3') { //1.3
		$bot->replyMessageNew($bot->replyToken, '24/30');
	}
	elseif($input == '1.4') { //1.4
		$bot->replyMessageNew($bot->replyToken, '100/100');
	}
	elseif($input == '1.5') { //1.5
		$bot->replyMessageNew($bot->replyToken, '17,702.79/20,000');
	}
	elseif($input == '1.6') { //1.6
		$bot->replyMessageNew($bot->replyToken, '100/100');
	}

    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
else{
    echo 'Event it empty';
}
