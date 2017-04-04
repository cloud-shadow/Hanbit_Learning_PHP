$dinner = '갑오징어 카레';

function vegetarian_dinner() {
    global $dinner;
    print "저녁 메뉴는 $dinner 였습니다만, 지금은 ";
    $dinner = '완두싹 볶음';
    print $dinner;
    print "입니다.\n";
}

print "일반 저녁 메뉴는 $dinner 입니다.\n";
vegetarian_dinner();
print "일반 저녁 메뉴는 $dinner 입니다.";