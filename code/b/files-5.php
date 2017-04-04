<?php
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
            } else if (strcasecmp(substr($full, -5), '.html') != 0) {
                $errors[] = '파일명은 .html로 끝나야 합니다.';
            } else {
                // 이상 없으면i n$put의 전체 경로를
                // process_form()에 전달한다.
                $input['full'] = $full;
            }
        }
    }

    return array($errors, $input);
}
