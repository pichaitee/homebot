
<script src="https://cdn.netpie.io/microgear.js"></script>

<script>

  const APPID = "YouNETPIEAppID";
  const KEY = "b5uB1JoFA1rjBRb";
  const SECRET = "Vc2fBchO5S39uWL9WxpfRQbLi";

  const ALIAS = "DigitalOUTPUT_HTML_web";     //  ชื่อตัวเอง
  const thing1 = "NodeMCU1";                                   //  ชื่อเพื่อนที่จะคุย

  function switchPress(logic){
    if(logic == 1 ){
      microgear.chat(thing1,"ON");
    }else if(logic == 0 ){
      microgear.chat(thing1,"OFF");
    }
  }

  var microgear = Microgear.create({
    key: KEY,
    secret: SECRET,
    alias : ALIAS
  });


  microgear.on('message', function(topic,data) {
    if(data=="ON"){
      document.getElementById("Status").innerHTML =  "Load is ON.";
    }else if(data=="OFF"){
      document.getElementById("Status").innerHTML =  "Load is OFF."; 
    }
  });

  microgear.on('connected', function() {
    microgear.setAlias(ALIAS);
    document.getElementById("connected_NETPIE").innerHTML = "Connected to NETPIE"
  });

  microgear.on('present', function(event) {
    console.log(event);
  });

  microgear.on('absent', function(event) {
    console.log(event);
  });

  microgear.resettoken(function(err) {
    microgear.connect(APPID);
  });
 
	
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
</script>
<?php


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
  linen();
 ?>
  switchPress(1);
 <?php
 }else if($arrJson['events'][0]['message']['text'] == "ปิดไฟหน้าบ้าน"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟหน้าบ้านแล้วค่ะ";
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
