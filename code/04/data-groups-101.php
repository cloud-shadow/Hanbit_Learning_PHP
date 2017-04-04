<?php
$dinner = array('스위트콘과 아스파라거스',
                '레몬 치킨',
                '삶은 망태버섯');
for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
    print "메뉴 번호 $i: $dinner[$i]\n";
}