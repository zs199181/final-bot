<?php

include 'line-bot.php';

use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;

$channelSecret = '0d39897911dcf7e20f94e714c59d3fc3';
$access_token  = 'EHGZnJh9TWJUMsFAop/DyUlwV0CXWzXCaYN58PRJ9aqaUOAGgeCSgJ7GAPm855/j8SOmPr/TP8hD2VpRXd+3dNIbBL+GFN7AW0C3jH0A3NtreLFu0fIdNq8FqHZiQTK/SWVRkEfoIQ62t0/nu7FH3AdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);

if (!empty($bot->isEvents)) {
    $input = $bot->message->text;
    if ($input == 'งานวันนี้') {
        // "baseSize": {
        //       "height": 1040,
        //       "width": 1040
        //   },
        // "actions": [
        //     {
        //         "type": "uri",
        //         "linkUri": "https://example.com/",
        //         "area": {
        //             "x": 0,
        //             "y": 0,
        //             "width": 520,
        //             "height": 1040
        //         }
        //     },
        //     {
        //         "type": "message",
        //         "text": "hello",
        //         "area": {
        //             "x": 520,
        //             "y": 0,
        //             "width": 520,
        //             "height": 1040
        //         }
        //     }
        // ]
        $baseUrl  = "https://botser.svoa.co.th/bot/image/work";
        $altText  = "งานสำหรับวันนี้";
        $baseSize = new BaseSizeBuilder(1040,1040);
        $actions = [
            // new ImagemapUriActionBuilder("https://www.google.co.th/", new AreaBuilder(520,0,520,1040)),
            new ImagemapMessageActionBuilder("งานทั้งหมดที่ assign", new AreaBuilder(0,0,510,510)),
            new ImagemapMessageActionBuilder("งานค้างทั้งหมด", new AreaBuilder(530,0,510,510)),
            new ImagemapMessageActionBuilder("งานใหม่ทั้งหมด", new AreaBuilder(0,530,510,510)),
            new ImagemapMessageActionBuilder("งานที่เสร็จทั้งหมด", new AreaBuilder(530,530,510,510)),
        ];
    }
    elseif ($input == 'ช่าง') {
        $baseUrl  = "https://botser.svoa.co.th/bot/image/technician";
        $altText  = "่างสำหรับวันนี้";
        $baseSize = new BaseSizeBuilder(530,1040);
        $actions = [
            new ImagemapMessageActionBuilder("จำนวนช่างทั้งหมด", new AreaBuilder(0,0,1040,260)),
            new ImagemapMessageActionBuilder("ช่างที่ได้รับ assign มากสุด", new AreaBuilder(0,270,515,260)),
            new ImagemapMessageActionBuilder("ช่างที่เลื่อนงานมากสุด", new AreaBuilder(270,270,515,260)),
        ];
    }
    elseif ($input == 'วิเคราะห์') {
        $baseUrl  = "https://botser.svoa.co.th/bot/image/analyze";
        $altText  = "วิเคราะห์";
        $baseSize = new BaseSizeBuilder(820,1040);
        $actions = [
            new ImagemapMessageActionBuilder("จำนวนงาน assign / จำนวนช่าง", new AreaBuilder(0,0,1040,260)),
            new ImagemapMessageActionBuilder("จำนวนงานเลื่อน / จำนวนงาน assign", new AreaBuilder(0,280,1040,260)),
                new ImagemapMessageActionBuilder("จำนวนงาน assign / จำนวนงานเลื่อน", new AreaBuilder(0,560,1040,260)),
            ];
    }

    $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);

    Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody();
    exit();

} else {
    echo 'bot event is empty';
}
