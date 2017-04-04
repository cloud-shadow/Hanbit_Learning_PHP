<?php
// 생성자는 실행 실패 시 항상 예외를 발생시킨다.
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (PDOException $e) {
    print "접속할 수 없습니다: " . $e->getMessage();
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$result = $db->exec("INSERT INTO dishes (dish_size, dish_name, price, is_spicy)
                         VALUES ('대', '참깨 퍼프', 2.50, 0)");
if (false === $result) {
    $error = $db->errorInfo();
    print "데이터를 추가할 수 없습니다!\n";
    print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
}
