<?php
// $access_token = 'HatdNCqxGq+BiYUUAxXYbz8Bjlx1Mx1O8tHLxim2y2cF2BuWxGxt6fIIfnudfQrdleHDBLSZtK6Ukjpt+dF6N1VcBv9PDUTuxJPCEhFCBULVTiyvv5TwTkBwzSBHUraOAcMmIMIi56OqrMsVIhra5gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;