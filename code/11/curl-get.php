<?php

$c = curl_init('http://numbersapi.com/09/27');
// cURL이 응답을 가져와 바로 출력하지 않고
// 문자열로 가져오도록 설정한다.
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// 요청 실행
$fact = curl_exec($c);

?>
Did you know that <?= $fact ?>
