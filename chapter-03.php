<?php

include ('line-bot.php');

$channelSecret = '12de6a97812901e6fee0a0bbab685eee';
$access_token  = 'HatdNCqxGq+BiYUUAxXYbz8Bjlx1Mx1O8tHLxim2y2cF2BuWxGxt6fIIfnudfQrdleHDBLSZtK6Ukjpt+dF6N1VcBv9PDUTuxJPCEhFCBULVTiyvv5TwTkBwzSBHUraOAcMmIMIi56OqrMsVIhra5gdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {

	include('connect.php');
	
	$input = $bot->message->text;
	// $input = "งานที่เข้ามา";
	echo $input;
	if($input == 'งานทั้งหมด') {
		//$bot->replyMessageNew($bot->replyToken, 'งานทั้งหมด 8 งาน');
		$sql = "SELECT count(*) FROM inf_location;";
		$result = mysqli_query($cn,$sql);
		$row = mysqli_fetch_array($result);
		$bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif ($input == 'งานใหม่') {
		//$bot->replyMessageNew($bot->replyToken, 'งานที่เข้ามา 15 งาน');
		$sql = "SELECT count(*) FROM inf_location where follow is not null;";
		$result = mysqli_query($cn,$sql);
		$row = mysqli_fetch_array($result);
		$bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif ($input == 'งานที่เสร็จ') {
		//$bot->replyMessageNew($bot->replyToken, 'งานที่เสร็จ 2 งาน');
 	    $search=" FirstCall IS NULL AND comp_compdt  IS NULL AND cancel_flag  IS NULL AND ass_engid  IS NULL " ; 	
		$sql = "SELECT  count(*)	FROM serv  WHERE  $search ;";
		$result = mysqli_query($cn,$sql);
		$row = mysqli_fetch_array($result);
		$bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif ($input == 'งานค้าง') {
		//$bot->replyMessageNew($bot->replyToken, 'งานที่เสร็จ 2 งาน');
		$sql = "SELECT count(*) FROM inf_location where date_comp is not null AND cancel is null  AND follow is null ;";
		$result = mysqli_query($cn,$sql);
		$row = mysqli_fetch_array($result);
		$bot->replyMessageNew($bot->replyToken,$row[0]);
	}
	elseif ($input == 'ช่าง') {
		//$bot->replyMessageNew($bot->replyToken, 'งานที่เสร็จ 2 งาน');
	    $query_loc = mysqli_query( $cn,"SELECT count(*) FROM inf_location group by eng_name ;" );
	    $b5  = mysqli_num_rows( $query_loc );
		$bot->replyMessageNew($bot->replyToken,$b5);

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
    include ('verify.php');
}

$query_loc = mysql_query( "SELECT count(*) FROM inf_location where date_comp is not null AND cancel is null  AND follow is null " );
	$res = mysql_fetch_array( $query_loc );
	$b3 = $res[0];