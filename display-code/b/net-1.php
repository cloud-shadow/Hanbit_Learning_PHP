$json = file_get_contents("http://php.net/releases/?json");
if ($json === false) {
    print "데이터를 가져올 수 없습니다.";
}
else {
    $feed = json_decode($json, true);
    // $feed는 배열이며 최상위 키는 주 버전 번호다.
    // 먼저 가장 큰 값을 뽑는다.
    $major_numbers = array_keys($feed);
    rsort($major_numbers);
    $biggest_major_number = $major_numbers[0];
    // 주 버전 번호는 배열의 가장 최신 버전 번호의 키 원소에서
    // "version" 원소에 지정된다.
    $version = $feed[$biggest_major_number]['version'];
    print "현재 PHP의 가장 최신 버전은 $version 입니다.";
}