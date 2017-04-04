<?php

// 폼 헬퍼 클래스 불러오기
require 'FormHelper.php';

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
    // 우선시되는 기본값으로 $form 객체 생성
    $form = new FormHelper();

    // 폼을 표시하는 모든 HTML은 명확성을 위해 분리된 파일에 둔다.
    include 'filename-form.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    // 파일명이 올바른지 확인한다.
    $input['file'] = trim($_POST['file'] ?? '');
    if (0 == strlen($input['file'])) {
        $errors[] = '파일명을 입력해주세요.';
    } else {
        // 전체 파일 경로가
        // 웹 서버의 문서 루트 하위에 있는지 확인한다.
        $full = $_SERVER['DOCUMENT_ROOT'] . '/' . $input['file'];
        // realpath() 를 이용해 .. 문자열이나
        // 심볼릭 링크를 변환한다.
        $full = realpath($full);
        if ($full === false) {
            $errors[] = "올바른 파일명을 입력해주세요.";
        } else {
            // f$ull 값이 문서 루트 디렉터리로 시작하는지 검사한다.
            $docroot_len = strlen($_SERVER['DOCUMENT_ROOT']);
            if (substr($full, 0, $docroot_len) != $_SERVER['DOCUMENT_ROOT']) {
                $errors[] = '문서 루트 안에 있는 파일을 입력해주세요.';
            } else {
                // 이상 없으면i n$put의 전체 경로를
                // process_form()에 전달한다.
                $input['full'] = $full;
            }
        }
    }

    return array($errors, $input);
}

    function process_form($input) {
    if (is_readable($input['full'])) {
        print htmlentities(file_get_contents($input['full']));
    } else {
        print "{$input['file']}을 읽을 수 없습니다.";
    }
}
?>
