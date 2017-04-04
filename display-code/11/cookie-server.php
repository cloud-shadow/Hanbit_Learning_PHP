// 쿠키가 전송되면 값을 사용하고 그렇지 않으면 0을 지정한다.
$value = $_COOKIE['c'] ?? 0;
// 1만큼 증가시킨다.
$value++;
// 새로운 쿠키 값을 응답에 설정한다.
setcookie('c', $value);
// 사용자에게 쿠키 목록을 보여준다.
print "쿠키 개수: " . count($_COOKIE) . "\n";
foreach ($_COOKIE as $k => $v) {
    print "$k: $v\n";
}