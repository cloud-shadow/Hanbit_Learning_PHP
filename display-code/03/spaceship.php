// 1은 12.7보다 작으므로 $a는 음수다.
$a = 1 <=> 12.7;

// "c"는 "b"보다 나중에 나오므로 $b는 양수다.
$b = "charlie" <=> "bob";

// strcmp()와는 달리 <와 >처럼 비교한다.
$x = '6 pack' <=> '55 card stud';
if ($x > 0) {
    print '문자열 "6 pack"은 문자열 "55 card stud"보다 크다.';
} elseif ($x < 0) {
    print '문자열 "6 pack"은 문자열 "55 card stud"보다 작다.';
}

// strcmp()와는 달리 <와 >처럼 비교한다.
$x = '6 pack' <=> 55;
if ($x > 0) {
    print '문자열 "6 pack"은 숫자 55보다 크다.';
} elseif ($x < 0) {
    print '문자열 "6 pack"은 숫자 55보다 작다.';
}
