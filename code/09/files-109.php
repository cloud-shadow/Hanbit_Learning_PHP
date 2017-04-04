<?php
$page = file_get_contents('page-template.html');
// 삼중 등호를 이용한 조건 표현식
if ($page === false) {
    print "템플릿을 불러올 수 없습니다: $php_errormsg";
} else {
    // ... 이곳에서 템플릿 처리
}
