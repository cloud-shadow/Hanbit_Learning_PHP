<?php
// 주소를 저장할 배열
$addresses = array();

$fh = fopen('addresses.txt','rb');
if (! $fh) {
    die("addresses.txt 파일을 열 수 없습니다: $php_errormsg");
}
while ((! feof($fh)) && ($line = fgets($fh))) {
    $line = trim($line);
    // 주소를 $addresses 배열의 키로 사용한다.
    // 키에 할당된 값은 해당 주소를 발견한 회수다.
    if (! isset($addresses[$line])) {
        $addresses[$line] = 0;
    }
    $addresses[$line] = $addresses[$line] + 1;
}
if (! fclose($fh)) {
    die("addresses.txt 파일을 저장할 수 없습니다: $php_errormsg");
}
// $addresses 배열의 값을 기준으로 큰 수부터 내림차순으로 정렬한다.
arsort($addresses);

$fh = fopen('addresses-count.txt','wb');
if (! $fh) {
    die("addresses-count.txt 파일을 열 수 없습니다: $php_errormsg");
}
foreach ($addresses as $address => $count) {
    // 줄 마지막에 개행 문자를 추가한다.
    if (fwrite($fh, "$count,$address\n") === false) {
        die("$count,$address 를 기록할 수 없습니다: $php_errormsg");
    }
}
if (! fclose($fh)) {
    die("addresses-count.txt 파일을 저장할 수 없습니다: $php_errormsg");
}