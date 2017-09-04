if ($logged_in) {
// 이 부분은 $logged_in이 참일 때 실행됩니다.
    print "환영합니다 정회원님.";
} elseif ($new_messages) {
// 이 부분은 $logged_in이 거짓이면서 $new_messages가 참일 때 실행됩니다.
    print "방문자님, 새로운 메시지가 있습니다.";
} elseif ($emergency) {
// $logged_in과 $new_messages가 거짓이고
// $emergency가 참이면 이 부분이 실행됩니다.
    print "방문자님, 새로운 메시지는 없습니다만, 긴급 상황입니다.";
} else {
// $logged_in과 $new_messages가 거짓이고
// $emergency까지 모두 거짓이라면 이 부분이 실행됩니다.
    print "누구신지 모르겠으나, 새로운 메시지도 없고, 긴급 상황도 아닙니다.";
}