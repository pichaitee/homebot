
<?php

function nodemcu1($state) {
    $ch = curl_init("https://api.netpie.io/microgear/YouNETPIEAppID/nodemcu1?auth=MwYg5OcLknkWohF:IjjOCtf7idPZ4BwMAxS70hqxl");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$state);
    $response = curl_exec($ch);
    return "$response\n";
  }

function linen()
{      
	define('LINE_API',"https://notify-api.line.me/api/notify");
	define('LINE_TOKEN','0LKWISh3dH62EGXv0eU1tL3JqJMkWfoZ4piWfZXfHC9');
	function notify_message($message){
	    $queryData = array('message' => $message);
	    $queryData = http_build_query($queryData,'','&');
	    $headerOptions = array(
		'http'=>array(
		    'method'=>'POST',
		    'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
				  ."Authorization: Bearer ".LINE_TOKEN."\r\n"
			      ."Content-Length: ".strlen($queryData)."\r\n",
		    'content' => $queryData
		)
	    );
	    $context = stream_context_create($headerOptions);
	    $result = file_get_contents(LINE_API,FALSE,$context);
	    $res = json_decode($result);
		return $res;
	}
	$res = notify_message('มีการเปิดไฟหน้าบ้าน');
	var_dump($res);
}
 
$strAccessToken = "oAjwYp4U0ZJgTZQ7Fd7D3a1bVQwbI9r9mG9v9u4G9RDl7iAjKKVogUIDyJ7R/YoIQPUPJTwaGGZ8HFaXnrx2USyzARVzHQI7oTIY6FrI4Fg1nvsA0m0hwTCocgjIhpbZJfLrSO3BEmTaPoSCDJxzGgdB04t89/1O/w1cDnyilFU=";

 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ยินดีที่ได้รู้จัก";
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
 }else if($arrJson['events'][0]['message']['text'] == "เปิดไฟหน้าบ้าน"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดไฟหน้าบ้านแล้วค่ะ";
  nodemcu1("ON");
 }else if($arrJson['events'][0]['message']['text'] == "ปิดไฟหน้าบ้าน"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟหน้าบ้านแล้วค่ะ";
  nodemcu1("OFF");
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
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
