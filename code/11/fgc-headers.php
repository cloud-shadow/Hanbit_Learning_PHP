<?php 

// 쿼리 데이터를 키와 값으로 설정하고 자동 변환한다.
$params = array('api_key' => NDB_API_KEY,
                'q' => 'black pepper');
$url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);

// Content-Type 헤더 설정
$options = array('header' => 'Content-Type: application/json');
// 'http' 스트림에 사용할 콘텍스트 생성
$context = stream_context_create(array('http' => $options));

// 세 인수를 전달해 file_get_contents 호출하기
print file_get_contents($url, false, $context);
