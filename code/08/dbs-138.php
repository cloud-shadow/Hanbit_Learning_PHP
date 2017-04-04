<?php
// 먼저, 일반적인 따옴표 처리를 한다.
$dish = $db->quote($_POST['dish_search']);
// 다음으로, 퍼센트 부호와 밑줄문자 앞에 역슬래시를 붙인다.
$dish = strtr($dish, array('_' => '\_', '%' => '\%'));
// 이제, $dish를 안전하게 쿼리 내부에 삽입할 수 있다.
$stmt = $db->query("SELECT dish_name, price FROM dishes
                    WHERE dish_name LIKE $dish");
