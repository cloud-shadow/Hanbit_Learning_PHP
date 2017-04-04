<?php 
// 쿠키 테스트 페이지 가져오기
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

// 쿠키를 'saved.cookies' 파일에 저장한다.
// 파일은 이 프로그램 파일과 같은 경로에 저장된다.
curl_setopt($c, CURLOPT_COOKIEJAR, __DIR__ . '/saved.cookies');

// 이전에 저장된 'saved.cookies' 파일이 있으면 파일에서 쿠키를 불러온다.
curl_setopt($c, CURLOPT_COOKIEFILE, __DIR__ . '/saved.cookies');

// 파일에 저장된 쿠키를 포함한 요청 보내기
$res = curl_exec($c);
print $res;
