<?php
$dinner = '갑오징어 카레';

function vegetarian_dinner() {
    print "저녁 메뉴는 $dinner, 또는 ";
    $dinner = '완두싹 볶음';
    print $dinner;
    print "입니다.\n";
}

function kosher_dinner() {
    print "저녁 메뉴는 $dinner, 또는 ";
    $dinner = '궁보계정';
    print $dinner;
    print "입니다.\n";
}

print "채식주의식 ";
vegetarian_dinner();
print "유태인식 ";
kosher_dinner();
print "일반 저녁 메뉴는 $dinner 입니다.";