// 쿠키 페이지를 가져올 때 쿠키를 전송하지 않는다.
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// 쿠키 설정 활성화
curl_setopt($c, CURLOPT_COOKIEJAR, true);

// 첫 번째 요청에는 쿠키가 없다.
$res = curl_exec($c);
print $res;

// 두 번째 요청에는 첫 번째 요청에서 받은 쿠키가 있다.
$res = curl_exec($c);
print $res;