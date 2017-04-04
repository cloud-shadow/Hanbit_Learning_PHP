<?php
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 비싼 메뉴 삭제
    if ($make_things_cheaper) {
        $db->exec("DELETE FROM dishes WHERE price > 19.95");
    } else {
        // 또는, 모든 메뉴 삭제
        $db->exec("DELETE FROM dishes");
    }
} catch (PDOException $e) {
    print "데이터를 삭제할 수 없습니다: " . $e->getMessage();
}
