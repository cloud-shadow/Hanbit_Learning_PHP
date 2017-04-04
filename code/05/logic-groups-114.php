<?php
$dinner = '갑오징어 카레';

function hungry_dinner() {
    $GLOBALS['dinner'] .= ' 그리고 바싹 익힌 토란';
}

print "일반 저녁 메뉴는 $dinner 입니다.";
print "\n";
hungry_dinner();
print "저녁 특선 메뉴는 $dinner 입니다.";