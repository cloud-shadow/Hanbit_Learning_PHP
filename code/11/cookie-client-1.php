<?php 

// 쿠키 페이지를 가져오며 쿠키를 전송하지 않는다.
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

// 첫번째 요청은 쿠키가 없다.
$res = curl_exec($c);
print $res;

// 두 번째 요청 역시 쿠키가 없다.
$res = curl_exec($c);
print $res;
