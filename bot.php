<?php
 
$strAccessToken = "oAjwYp4U0ZJgTZQ7Fd7D3a1bVQwbI9r9mG9v9u4G9RDl7iAjKKVogUIDyJ7R/YoIQPUPJTwaGGZ8HFaXnrx2USyzARVzHQI7oTIY6FrI4Fg1nvsA0m0hwTCocgjIhpbZJfLrSO3BEmTaPoSCDJxzGgdB04t89/1O/w1cDnyilFU=";
 
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "tjscreen";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
