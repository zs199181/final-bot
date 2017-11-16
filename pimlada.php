<?php

include ('line-bot.php');

use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;

$channelSecret = '12de6a97812901e6fee0a0bbab685eee';
$access_token  = 'HatdNCqxGq+BiYUUAxXYbz8Bjlx1Mx1O8tHLxim2y2cF2BuWxGxt6fIIfnudfQrdleHDBLSZtK6Ukjpt+dF6N1VcBv9PDUTuxJPCEhFCBULVTiyvv5TwTkBwzSBHUraOAcMmIMIi56OqrMsVIhra5gdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {

	include('connect.php');
	
	$input = $bot->message->text;

	if ($input == 'งานวันนี้') {
	    $baseUrl  = "https://botser.svoa.co.th/bot/image/work";
        $altText  = "งานสำหรับวันนี้";
        $baseSize = new BaseSizeBuilder(1040,1040);
        $actions = [
            // new ImagemapUriActionBuilder("https://www.google.co.th/", new AreaBuilder(520,0,520,1040)),
            new ImagemapMessageActionBuilder("งานทั้งหมดที่assign", new AreaBuilder(0,0,510,510)),
            new ImagemapMessageActionBuilder("งานค้างทั้งหมด", new AreaBuilder(530,0,510,510)),
            new ImagemapMessageActionBuilder("งานใหม่ทั้งหมด", new AreaBuilder(0,530,510,510)),
            new ImagemapMessageActionBuilder("งานที่เสร็จทั้งหมด", new AreaBuilder(530,530,510,510)),
        ];
        $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);
     }
    elseif ($input == 'ช่าง') {
        $baseUrl  = "https://botser.svoa.co.th/bot/image/technician";
        $altText  = "่างสำหรับวันนี้";
        $baseSize = new BaseSizeBuilder(530,1040);
        $actions = [
            new ImagemapMessageActionBuilder("จำนวนช่างทั้งหมด", new AreaBuilder(0,0,1040,260)),
            new ImagemapMessageActionBuilder("ช่างที่ได้รับassignมากสุด", new AreaBuilder(0,270,515,260)),
            new ImagemapMessageActionBuilder("ช่างที่เลื่อนงานมากสุด", new AreaBuilder(270,270,515,260)),
        ];
        $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);
    }
    elseif ($input == 'วิเคราะห์') {
        $baseUrl  = "https://botser.svoa.co.th/bot/image/analyze";
        $altText  = "วิเคราะห์";
        $baseSize = new BaseSizeBuilder(820,1040);
        $actions = [
            new ImagemapMessageActionBuilder("จำนวนงานassign/จำนวนช่าง", new AreaBuilder(0,0,1040,260)),
            new ImagemapMessageActionBuilder("จำนวนงานเลื่อน/จำนวนงานassign", new AreaBuilder(0,280,1040,260)),
            new ImagemapMessageActionBuilder("จำนวนงานassign/จำนวนงานเลื่อน", new AreaBuilder(0,560,1040,260)),
        ];
        $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);
    }
    elseif ($input == 'สอบถาม') {
        $baseUrl  = "https://botser.svoa.co.th/bot/image/question";
        $altText  = "วิเคราะห์";
        $baseSize = new BaseSizeBuilder(820,1040);
        $actions = [
            new ImagemapMessageActionBuilder("พิมพ์ชื่อช่าง", new AreaBuilder(0,0,510,510)),
            new ImagemapMessageActionBuilder("พิมพ์เขต", new AreaBuilder(530,0,510,510)),
            new ImagemapMessageActionBuilder("พิมพ์SER", new AreaBuilder(0,530,510,510)),
            new ImagemapMessageActionBuilder("พิมพ์SERstatu", new AreaBuilder(530,530,510,510)),
        ];
        $bot->replyImagemapMessage($bot->replyToken, $baseUrl, $altText, $baseSize, $actions);
    }
    elseif($input == 'งานทั้งหมดที่assign') { //sql11
		$bot->replyMessageNew($bot->replyToken, 'sql11');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'งานค้างทั้งหมด') { //sql12
		$bot->replyMessageNew($bot->replyToken, 'sql12');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'งานใหม่ทั้งหมด') { //sql13
		$bot->replyMessageNew($bot->replyToken, 'sql13');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'งานที่เสร็จทั้งหมด') { //sql14
		$bot->replyMessageNew($bot->replyToken, 'sql14');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'จำนวนช่างทั้งหมด') { //sql21
		$bot->replyMessageNew($bot->replyToken, 'sql21');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'ช่างที่ได้รับassignมากสุด') { //sql22
		$bot->replyMessageNew($bot->replyToken, 'sql22');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'ช่างที่เลื่อนงานมากสุด') { //sql23
		$bot->replyMessageNew($bot->replyToken, 'sql23');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'จำนวนงานassign/จำนวนช่าง') { //sql31
		$bot->replyMessageNew($bot->replyToken, 'sql31');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'จำนวนงานเลื่อน/จำนวนงานassign') { //sql32
		$bot->replyMessageNew($bot->replyToken, 'sql32');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'จำนวนงานassign/จำนวนงานเลื่อน') { //sql33
		$bot->replyMessageNew($bot->replyToken, 'sql33');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'พิมพ์ชื่อช่าง') { //sql41
		$bot->replyMessageNew($bot->replyToken, 'sql41');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'พิมพ์เขต') { //sql42
		$bot->replyMessageNew($bot->replyToken, 'sql42');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'พิมพ์SER') { //sql43
		$bot->replyMessageNew($bot->replyToken, 'sql43');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif($input == 'พิมพ์SERstatu') { //sql44
		$bot->replyMessageNew($bot->replyToken, 'sql44');
		// $sql = "SELECT count(*) FROM inf_location;";
		// $result = mysqli_query($cn,$sql);
		// $row = mysqli_fetch_array($result);
		// $bot->replyMessageNew($bot->replyToken,$row[0]);
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
    // echo 'Connect Succeeded!';
    echo 'Event it empty';
}

$query_loc = mysql_query( "SELECT count(*) FROM inf_location where date_comp is not null AND cancel is null  AND follow is null " );
	$res = mysql_fetch_array( $query_loc );
	$b3 = $res[0];