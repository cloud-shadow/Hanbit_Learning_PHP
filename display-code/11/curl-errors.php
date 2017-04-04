// 존재하지 않은 API를 임의로 설정
$c = curl_init('http://api.example.com');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($c);
// 성공 여부에 관계없이 접속 정보를 모두 가져오기
$info = curl_getinfo($c);

// 접속에 문제가 있을 때
if ($result === false) {
    print "오류 #" . curl_errno($c) . "\n";
    print "이런! cURL 오류입니다: " . curl_error($c) . "\n";
}
// 400번대와 500번대 오류 코드는 HTTP 응답 오류다.
else if ($info['http_code'] >= 400) {
    print "서버가 HTTP 오류를 반환했습니다 {$info['http_code']}.\n";
}
else {
    print "접속에 성공했습니다!\n";
}
// 요청 정보 중에는 소요 시간도 있다.
print "접속에 소요된 시간은 {$info['total_time']} 초 입니다.\n";
