<?php
// SQLite 데이터베이스 'dinner.db'를 사용
$db = new PDO('sqlite:dinner.db');
// 허용되는 메뉴 구분 정의
$meals = array('아침','점심','저녁');
// 제출된 폼 매개변수 "meal" 값이
// "아침", "점심", "저녁" 중 하나인지 확인
if (in_array($_POST['meal'], $meals)) {
    // 맞는다면, 해당하는 모든 요리 가져오기
    $stmt = $db->prepare('SELECT dish,price FROM meals WHERE meal LIKE ?');
    $stmt->execute(array($_POST['meal']));
    $rows = $stmt->fetchAll();
    // 데이터베이스에서 아무 요리도 발견하지 못했다면
    if (count($rows) == 0) {
        print "가능한 요리가 없습니다.";
    } else {
        // 각 요리와 가격을H TML 표에 한 줄씩 출력하기
        print '<table><tr><th>요리</th><th>가격</th></tr>';
        foreach ($rows as $row) {
            print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
        }
        print "</table>";
    }
} else {
    // "meal" 변수가 "아침", "점심", "저녁" 중 하나가 아니라면
    // 다음을 출력
    print "알 수 없는 메뉴입니다.";
}
?>
