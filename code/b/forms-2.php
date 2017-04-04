<?php
/* 폼 데이터를 처리하는 부분이므로, $input 배열 대신
$_POST 변수를 직접 사용한다. */
function process_form() {
    print '<ul>';
    foreach ($_POST as $k => $v) {
        print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
    }
    print '</ul>';
}