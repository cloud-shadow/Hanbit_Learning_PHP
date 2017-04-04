$meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50,
               'Shrimp Puffs' => 0); // Shrimp Puffs 는 무료!
$books = array("이용객을 위한 A급 중국어 안내",
               '중국의 요리 방식과 식사 문화');

// 다음 조건식은 참이다.
if (array_key_exists('Shrimp Puffs',$meals)) {
    print "네, Shrimp Puffs 메뉴도 가능합니다.";
}
// 다음 조건식은 거짓이다.
if (array_key_exists('Steak Sandwich',$meals)) {
    print "Steak Sandwich 메뉴도 있습니다.";
}
// 다음 조건식은 참이다.
if (array_key_exists(1, $books)) {
    print "1번 원소는 중국의 요리 방식과 식사 문화입니다.";
}