<?php

$q = $db->query('SELECT dish_name, price FROM dishes');
// $rows는 원소가 4개인 배열이다.
// 각 원소는 데이터베이스의 데이터 로우 하나에 해당한다.
$rows = $q->fetchAll();
