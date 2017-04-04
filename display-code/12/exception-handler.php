function niceExceptionHandler($ex) {
    // 사용자 친화적인 메시지 출력
    print "죄송합니다. 잠시 후 다시 시도해주세요.";
    // 시스템 관리자에게 전달할 자세한 정보 기록
    error_log("{$ex->getMessage()} in {$ex->getFile()} @ {$ex->getLine()}");
    error_log($ex->getTraceAsString());
}

set_exception_handler('niceExceptionHandler');

print "데이터베이스 접속 실패 상황을 재현합니다.\n";

// PDO 생성자로 전달된 DSN에 올바른 데이터베이스와 접속 매개변수가 없으므로
// 생성자가 예외를 일으킨다.
$db = new PDO('garbage:this is obviously not going to work!');

print "이 메시지는 출력되지 않을 것입니다.";
