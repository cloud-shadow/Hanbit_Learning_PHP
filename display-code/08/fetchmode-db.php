// setAttribute()에 기본값을 설정하면
// setFetchMode()나 fetch()에 아무 값도 넣을 필요가 없다.
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);

$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch()) {
    print implode(', ', $row) . "\n";
}

$anotherQuery = $db->query('SELECT dish_name FROM dishes WHERE price < 5');
// $moreDishes의 각 하위 배열도 숫자키 배열이다.
$moreDishes = $anotherQuery->fetchAll();
