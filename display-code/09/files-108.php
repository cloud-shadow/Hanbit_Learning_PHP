try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "데이터베이스에 접속할 수 없습니다: " . $e->getMessage();
    exit();
}

// dishes.txt 파일을 쓰기 모드로 열기
$fh = fopen('/usr/local/dishes.txt','wb');
if (! $fh) {
    print "dishes.txt 파일을 열 수 없습니다: $php_errormsg";
} else {
    $q = $db->query("SELECT dish_name, price FROM dishes");
    while($row = $q->fetch( )) {
        // 각 줄을d ishes.txt에 쓰기
        // (줄 마지막에 개행문자 추가)
        fwrite($fh, "$row[0]의 가격은 $row[1] \n");
    }
    if (! fclose($fh)) {
        print "dishes.txt 파일을 닫을 수 없습니다: $php_errormsg";
    }
}