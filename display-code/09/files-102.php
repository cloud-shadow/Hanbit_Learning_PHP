try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "데이터베이스에 접속할 수 없습니다: " . $e->getMessage();
    exit();
}

// 쓰기 모드로 CSV 파일 열기
$fh = fopen('dish-list.csv','wb');

$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    // CSV 형식 문자열로 $row의 데이터 쓰기
    // fputcsv() 함수는 줄 끝에 개행 문자를 더한다.
    fputcsv($fh, $row);
}
fclose($fh);