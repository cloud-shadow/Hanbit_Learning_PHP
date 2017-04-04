<?php
$my_color = '#000000';

// 잘못된 구문. 기본값에 변수를 지정할 수 없다.
function page_header_bad($color = $my_color) {
    print '<html><head><title>저의 홈페이지에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#' . $color . '">';
}