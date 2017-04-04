<?php 

// 지원하는 형식
$formats = array('application/json','text/html','text/plain');
// 응답 형식이 지정되지 않았을 때
$default_format = 'application/json';

// 응답 형식이 지정됐는가?
if (isset($_SERVER['HTTP_ACCEPT'])) {
// 지정됐다면 그대로 사용한다.
    if (in_array($_SERVER['HTTP_ACCEPT'], $formats)) {
        $format = $_SERVER['HTTP_ACCEPT'];
    }
// 지원되지 않는 형식일 경우 오류를 반환한다.
    else {
// 406은 "지원하지 않는 응답 형식입니다"를 의미한다.
        http_response_code(406);
// 여기서 종료하면 요청 본문에 아무 내용도 없지만, 문제 없다.
        exit();
    }
} else {
    $format = $default_format;
}

// 현재 시각 확인
$response_data = array('now' => time());
// 전송 응답 형식을 클라이언트에 알려주기
header("Content-Type: $format");
// 지정된 형식으로 시각을 출력하기
if ($format == 'application/json') {
    print json_encode($response_data);
}
else if ($format == 'text/html') { ?>
<!doctype html>
  <html>
    <head><title>시계</title></head>
    <body><time><?= date('c', $response_data['now']) ?></time></body>
  </html>
<?php 
} else if ($format == 'text/plain') {
    print $response_data['now'];
}