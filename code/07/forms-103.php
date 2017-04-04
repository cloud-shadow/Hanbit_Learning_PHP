<?php
// 6개월 전을 나타내는 DateTime 객체 생성
$range_start = new DateTime('6 months ago');
// 현재를 나타내는 DateTime 객체 생성
$range_end = new DateTime();

// $_POST['year']가 1900부터 2100 사이의 연도인지 검사한다.
// $_POST['month']가 1부터 12 사이의 월인지 검사한다.
// $_POST['day']가 1부터 31 사이의 일인지 검사한다.
$input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 1900,
                                                       'max_range' => 2100)));
$input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT,
                               array('options' => array('min_range' => 1,
                                                        'max_range' => 12)));
$input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT,
                             array('options' => array('min_range' => 1,
                                                      'max_range' => 31)));
// 연도, 월, 일은 0이 될 수 없으므로 항등 연산자(= = = )를 사용할 필요가 없다.
// 특정 월에 해당하는 일자가 올바른지 확인하고자 checkdate() 함수를 사용한다.
if ($input['year'] && $input['month'] && $input['day'] &&
    checkdate($input['month'], $input['day'], $input['year'])) {
    $submitted_date = new DateTime(strtotime($input['year'] . '-' .
                                             $input['month'] . '-' .
                                             $input['day']));
    if (($range_start > $submitted_date) || ($range_end < $submitted_date)) {
        $errors[] = '지난 6개월 사이에 속하는 날짜를 입력해주세요.';
    }
} else {
    // 이 부분은 연도, 월, 일 폼 매개변수 중 하나라도 누락했거나
    // 2월 31일처럼 올바르지 않은 날짜를 입력했을 때 수행된다.
    $errors[] = '올바른 날짜를 입력해주세요.';
}
