<?php

// 이 파일과 FormHelper.php 파일은
// 같은 디렉터리에 있어야 한다.
require 'FormHelper.php';

// select 메뉴의 선택 항목 배열 생성
// 이 배열은 display_form(), validate_form(),process_form()에서 사용되므로
// 전역 영역에 선언한다.
$ops = array('+','-','*','/');

// 메인 페이지 로직
// - 폼이 제출되면, 검증 과정을 거쳐 처리하거나 폼을 다시 출력하고
// - 제출되지 않았으면 폼을 출력한다.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate_form()이 오류 메시지를 반환하면 show_form()로 전달
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        // 제출 데이터가 검증을 통과하면 처리한다.
        process_form($input);
        // 다음 계산을 입력받을 폼을 출력한다.
        show_form();
    }
} else {
    // 폼이 제출되지 않았으면 폼을 출력한다.
    show_form();
}

function show_form($errors = array()) {
    $defaults = array('num1' => 2,
                      'op' => 2, // the index of '*' in $ops
                      'num2' => 8);
    // 기본값을 이용해 $form 객체를 생성한다.
    $form = new FormHelper($defaults);

    // 폼 출력과 관련된 모든 HTML은 별도의 파일로 완전히 분리한다.
    include 'math-form.php';
}

function validate_form( ) {
    $input = array();
    $errors = array( );

    // op는 필수 항목이다.
    $input['op'] = $GLOBALS['ops'][$_POST['op']] ?? '';
    if (! in_array($input['op'], $GLOBALS['ops'])) {
        $errors[] = '연산자를 선택하세요.';
    }
// num1과 num2는 숫자여야 한다.
    $input['num1'] = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num1']) || ($input['num1'] === false)) {
        $errors[] = '첫 번째 수를 입력하세요.';
    }

    $input['num2'] = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num2']) || ($input['num2'] === false)) {
        $errors[] = '두 번째 수를 입력하세요.';
    }

    // 0으로 나눌 수 없다.
    if (($input['op'] == '/') && ($input['num2'] == 0)) {
        $errors[] = '0으로 나눌 수 없습니다.';
    }

    return array($errors, $input);
}

function process_form($input) {
    $result = 0;
    if ($input['op'] == '+') {
        $result = $input['num1'] + $input['num2'];
    }
    else if ($input['op'] == '-') {
        $result = $input['num1'] - $input['num2'];
    }
    else if ($input['op'] == '*') {
        $result = $input['num1'] * $input['num2'];
    }
    else if ($input['op'] == '/') {
        $result = $input['num1'] / $input['num2'];
    }
    $message = "{$input['num1']} {$input['op']} {$input['num2']} = $result";

    print "<h3>$message</h3>";
}
?>
