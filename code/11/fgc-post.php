<?php 

$url = 'http://php7.example.com/post-server.php';

// POST로 전달할 두 변수
$form_data = array('name' => 'black pepper',
                   'smell' => 'good');
// 메서드, 본문 형식, 본문 지정
$options = array('method' => 'POST',
                 'header' => 'Content-Type: application/x-www-form-urlencoded',
                 'content' => http_build_query($form_data));
// 'http' 스트림 콘텍스트 생성
$context = stream_context_create(array('http' => $options));
// file_get_contents의 세 번째 인수로 콘텍스트 전달
print file_get_contents($url, false, $context);
