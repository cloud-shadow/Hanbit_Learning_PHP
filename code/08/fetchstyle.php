<?php

// 숫자키 배열로만 가져오기, 값을 조합하기 쉽다.
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_NUM)) {
    print implode(', ', $row) . "\n";
}

// 객체로 받기, 값을 가져올 때 속성에 접근하는 문법
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_OBJ)) {
    print "{$row->dish_name} has price {$row->price} \n";
}
