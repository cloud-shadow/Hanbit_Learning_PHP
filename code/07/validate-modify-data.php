<?php
// 요청 메서드에 따라 실행할 함수를 결정하는 로직
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// validate_form()이 오류 메시지 배열을 반환하면 show_form()에 전달한다.
    list($form_errors, $input) = validate_form();
    if ($form_errors) {
        show_form($form_errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}
