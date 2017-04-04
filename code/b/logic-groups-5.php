<?php

/* dechex() 함수를 사용한다. */
function web_color1($red, $green, $blue) {
    $hex = [ dechex($red), dechex($green), dechex($blue) ];
// 변환한 16진수가 1자리 수라면 앞에 0을 붙인다.
    foreach ($hex as $i => $val) {
        if (strlen($i) == 1) {
            $hex[$i] = "0$val";
        }
    }
    return '#' . implode('', $hex);
}
/* sprintf() 함수에 %x 형식 문자열을 사용해
16진수를 10진수로 바꿀 수 있다. */
function web_color2($red, $green, $blue) {
    return sprintf('#%02x%02x%02x', $red, $green, $blue);
}