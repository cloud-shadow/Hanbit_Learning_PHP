<?php

function exceptionHandler($ex) {
    // 오류 정보를 오류 로그에 기록한다.
    error_log("ERROR: " . $ex->getMessage());
    // 일반적인 메시지를 사용자에게 보여주고 프로그램을 종료한다.
    die("<p>죄송합니다. 문제가 생겼습니다.</p>");
}
set_exception_handler('exceptionHandler');
