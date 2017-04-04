$dinner = '갑오징어 카레';

function macrobiotic_dinner() {
    $dinner = "모듬 채소";
    print "저녁 메뉴는 $dinner 입니다.";
// 해산물의 유혹에 굴복하고 말았음
    print " 하지만 저는 ";
    print $GLOBALS['dinner'];
    print "를 먹겠어요.\n";
}

macrobiotic_dinner();
print "일반 저녁 메뉴: $dinner";