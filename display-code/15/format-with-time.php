// 시간만 입력하면 날짜는 현재의 일/월/연도로 지정된다.
$a = new DateTime('10:36 am');
// 날짜만 입력하면 시간은 현재의 시/분/초로 지정된다.
$b = new DateTime('5/11');
$c = new DateTime('March 5th 2017');
$d = new DateTime('3/10/2018');
$e = new DateTime('2015-03-10 17:34:45');
// DateTime은 백만분의 일초 단위까지 지정할 수 있다.
$f = new DateTime('2015-03-10 17:34:45.326425');
// @로 시작하는 숫자는 유닉스 타임스탬프로 인식한다.
$g = new DateTime('@381718923');
// 일반적인 로그 형식
$h = new DateTime('3/Mar/2015:17:34:45 +0400');

// 상대적인 표현도 사용할 수 있다!
$i = new DateTime('next Tuesday');
$j = new DateTime("last day of April 2015");
$k = new DateTime("November 1, 2012 + 2 weeks");