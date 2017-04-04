<?php
$meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50);

foreach ($meals as $dish => $price) {
// $price = $price * 2 구문은 효과가 없다.
    $meals[$dish] = $meals[$dish] * 2;
}

// 다시 한번 배열을 순회하며 변경된 값을 출력한다.
foreach ($meals as $dish => $price) {
    printf("%s 메뉴의 변경된 가격은 \$%.2f입니다.\n",$dish,$price);
}