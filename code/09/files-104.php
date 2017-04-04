<?php
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "데이터베이스에 접속할 수 없습니다: " . $e->getMessage();
    exit();
}

// 웹 클라이언트의 수신 형식을 "dishes.csv"라는 CSV 파일로 지정하기
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="dishes.csv"');

// 출력 스트림을 향해 파일 핸들 열기
$fh = fopen('php://output','wb');

// 데이터베이스로부터 정보를 가져오고 출력하기
$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    fputcsv($fh, $row);
}
