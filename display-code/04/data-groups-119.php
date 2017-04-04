$prices['dinner']['Sweet Corn and Asparagus'] = 12.50;
$prices['lunch']['Cashew Nuts and White Mushrooms'] = 4.95;
$prices['dinner']['Braised Bamboo Fungus'] = 8.95;

$prices['dinner']['total'] = $prices['dinner']['Sweet Corn and Asparagus'] +
                             $prices['dinner']['Braised Bamboo Fungus'];

$specials[0][0] = '체스트넛 번';
$specials[0][1] = '호두 번';
$specials[0][2] = '땅콩 번';
$specials[1][0] = '체스트넛 샐러드';
$specials[1][1] = '호두 샐러드';
// 숫자 키를 생략하면 배열 마지막에 추가된다.
// 이 구문은 $specials[1][2]에 저장된다.
$specials[1][] = '땅콩 샐러드';