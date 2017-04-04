// 지금부터 한시간 이후 만료되는 쿠키
setcookie('short-userid','ralph',time( ) + 60*60);

// 지금부터 24시간 이후 만료되는 쿠키
setcookie('longer-userid','ralph',time( ) + 60*60*24);

// 2019년 10월 1일 정오에 만료되는 쿠키
$d = new DateTime("2019-10-01 12:00:00");
setcookie('much-longer-userid','ralph', $d->format('U'));