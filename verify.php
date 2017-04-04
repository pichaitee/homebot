<?php
$access_token = 'oAjwYp4U0ZJgTZQ7Fd7D3a1bVQwbI9r9mG9v9u4G9RDl7iAjKKVogUIDyJ7R/YoIQPUPJTwaGGZ8HFaXnrx2USyzARVzHQI7oTIY6FrI4Fg1nvsA0m0hwTCocgjIhpbZJfLrSO3BEmTaPoSCDJxzGgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;