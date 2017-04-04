try {
    // 데이터베이스 접속
    $db = new PDO('sqlite:/tmp/restaurant.db');
    // DB 오류와 예외 설정
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->query('SELECT * FROM dishes ORDER BY price');
    $dishes = $stmt->fetchAll();
    if (count($dishes) == 0) {
        $html = '<p>발견된 메뉴가 없습니다.</p>';
    } else {
        $html = "<table>\n";
        $html .= "<tr><th>메뉴명</th><th>가격</th><th>맵기</th></tr>\n";
        foreach ($dishes as $dish) {
            $html .= '<tr><td>' .
                  htmlentities($dish['dish_name']) . '</td><td>$' .
                  sprintf('%.02f', $dish['price']) . '</td><td>' .
                  ($dish['is_spicy'] ? 'Yes' : 'No') . "</td></tr>\n";
        }
        $html .= "</table>";
    }
} catch (PDOException $e) {
    $html = "메뉴를 가져올 수 없습니다: " . $e->getMessage();
}
print $html;