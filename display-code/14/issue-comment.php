// MXH-26: 이메일 주소에 + 문자가 있을 때 생기는 문제를 방지하기 위해 URL을 인코딩함.
$email = urlencode($email);