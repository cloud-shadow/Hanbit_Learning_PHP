<?php
// $_SESSION 을 자유롭게 사용하기 위해 세션을 활성화한다.
session_start();

// 폼 헬퍼 클래스 불러오기
require 'FormHelper.php';

$colors = array('ff0000' => 'Red',
                'ffa500' => 'Orange',
                'ffffff' => 'Yellow',
                '008000' => 'Green',
                '0000ff' => 'Blue',
                '4b0082' => 'Indigo',
                '663399' => 'Rebecca Purple');

// 페이지의 주 로직:
// - 폼이 제출되면, 검증 과정을 수행하고 재표시한다.
// - 제출되지 않았으면 폼을 표시한다.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate_form()이 오류를 반환하면 show_form()으로 전달한다.
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        // 제출된 데이터가 올바르면, 처리한다.
        process_form($input);
    }
} else {
    // 폼이 제출되지 않았으면 폼을 표시한다.
    show_form();
}

function show_form($errors = array()) {
    global $colors;

    // 우선시되는 기본값으로 $form 객체 생성
    $form = new FormHelper();
    // 폼을 표시하는 모든 HTML은 명확성을 위해 분리된 파일에 둔다.
    include 'color-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // color은 올바른 색상이어야 한다.
    $input['color'] = $_POST['color'] ?? '';
    if (! array_key_exists($input['color'], $GLOBALS['colors'])) {
        $errors[] = '올바른 색상을 선택하세요.';
    }

    return array($errors, $input);
}

function process_form($input) {
    global $colors;

    $_SESSION['background_color'] = $input['color'];
    print '<p>선택한 색상이 적용됐습니다.</p>';
}
?>
