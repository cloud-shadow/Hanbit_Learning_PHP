// $_POST['mo'], $_POST['dy'], $_POST['yr']
// 이 세 값은 폼으로 제출된 월, 일, 연도 값이다.
//
// $_POST['hr'], $_POST['mn']
// 이 두 값은 폼으로 제출된 시간과 분이다.

// 먼저 $d에 현재 시각이 지정되고, setDate와 setTime에 의해 갱신된다.
$d = new DateTime();

$d->setDate($_POST['yr'], $_POST['mo'], $_POST['dy']);
$d->setTime($_POST['hr'], $_POST['mn']);

print $d->format('r');