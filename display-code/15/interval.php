$now = new DateTime();
$birthdate = new DateTime('1990-05-12');
$diff = $birthdate->diff($now);

if (($diff->y > 13) && ($diff->invert == 0)) {
    print "13세 이상입니다.";
} else {
    print "제한 연령입니다.";
}