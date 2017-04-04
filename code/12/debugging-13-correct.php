<?php
// 데이터베이스 접속
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    die("접속할 수 없습니다: " . $e->getMessage());
}
// DB 오류와 예외 설정
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 배열 방식으로 가져오기
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// 데이터베이스에서 메뉴명을 배열로 가져온다.
$dish_names = array( );
$res = $db->query('SELECT dish_id,dish_name FROM dishes');
foreach ($res->fetchAll() as $row) {
    $dish_names[ $row['dish_id'] ] = $row['dish_name'];
}
$res = $db->query('SELECT * FROM customers ORDER BY phone DESC');
$customers = $res->fetchAll();
if (count($customers) == 0) {
    print "고객이 존재하지 않습니다.";
} else {
    print '<table>';
    print '<tr><th>ID</th><th>이름</th><th>전화번호</th><th>단골 메뉴</th></tr>';
    foreach ($customers as $customer) {
        printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
               $customer['customer_id'],
               htmlentities($customer['customer_name']),
               $customer['phone'],
               $dish_names[$customer['favorite_dish_id']]);
    }
    print '</table>';
}
?>
