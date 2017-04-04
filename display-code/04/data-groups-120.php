// $vegetables은 배열이 된다.
$vegetables['corn'] = '노랑';

// $vegetables는 "corn"이나 "yellow"와 관계없는 스칼라가 된다.
$vegetables = '맛있어';

// $fruits는 스칼라가 된다.
$fruits = 283;

// 다음 구문은 작동하지 않는다.
// PHP 엔진은 경고를 발생시키고 $fruits의 값은 283으로 유지된다.
$fruits['potassium'] = '바나나';

// 그러나 이 구문은 $fruits 변수에 배열을 덮어씌운다.
$fruits = array('potassium' => '바나나');
