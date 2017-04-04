try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "데이터베이스에 접속할 수 없습니다: " . $e->getMessage();
    exit();
}
$fh = fopen('dishes.csv','rb');
$stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy) VALUES (?,?,?)');
while ((! feof($fh)) && ($info = fgetcsv($fh))) {
    // $info[0] 은 메뉴명이다(dishes.csv 파일의 첫 번째 필드).
    // $info[1] 은 가격이다(두 번째 필드).
    // $info[2] 은 매운 정도다(세 번째 필드).
    // 데이터베이스 테이블에 로우 삽입
    $stmt->execute($info);
    print "$info[0] 삽입 완료\n";
}
// 파일 닫기
fclose($fh);
