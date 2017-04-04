<?php
session_start( );
$main_dishes = array('cuke' => '데친 해삼',
                     'stomach' => "순대",
                     'tripe' => '와인 소스 양대창',
                     'taro' => '돼지고기 토란국',
                     'giblets' => '곱창 소금 구이',
                     'abalone' => '전복 호박 볶음');

if (isset($_SESSION['order']) && (count($_SESSION['order']) > 0)) {
    print '<ul>';
    foreach ($_SESSION['order'] as $order) {
        $dish_name = $main_dishes[ $order['dish'] ];
        print "<li> $dish_name : $order[quantity] 개 </li>";
    } 
    print "</ul>";
} else {
    print "주문 내역이 없습니다.";
}
?>
