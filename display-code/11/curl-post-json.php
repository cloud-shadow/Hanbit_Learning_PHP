$url = 'http://php7.example.com/post-server.php';

// POST로 전달할 두 변수
$form_data = array('name' => 'black pepper',
                   'smell' => 'good');

$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// 요청을 POST로 설정한다.
curl_setopt($c, CURLOPT_POST, true);
// 요청을 JSON으로 전달하는 헤더 설정
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// 전송할 데이터를 알맞은 형식으로 가공하기
curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($form_data));

print curl_exec($c);