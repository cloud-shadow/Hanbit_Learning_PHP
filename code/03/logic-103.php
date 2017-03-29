<?php
$x = strcmp("x54321","x5678");
if ($x > 0) {
    print '문자열 "x54321"은 문자열 "x5678"보다 크다.';
} elseif ($x < 0) {
    print '문자열 "x54321"은 문자열 "x5678"보다 작다.';
}

$x = strcmp("54321","5678");
if ($x > 0) {
    print '문자열 "54321"은 문자열 "5678"보다 크다.';
} elseif ($x < 0) {
    print '문자열 "54321"은 문자열 "5678"보다 작다.';
}

$x = strcmp('6 pack','55 card stud');
if ($x > 0) {
    print '문자열 "6 pack"은 문자열 "55 card stud"보다 크다.';
} elseif ($x < 0) {
    print '문자열 "6 pack"은 문자열 "55 card stud"보다 작다.';
}

$x = strcmp('6 pack',55);
if ($x > 0) {
    print '문자열 "6 pack"은 숫자 55보다 크다.';
} elseif ($x < 0) {
    print '문자열 "6 pack"은 숫자 55보다 작다.';
}