<?php
// 요청 메서드에 따라 실행할 함수를 결정하는 로직
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate_form()이 오류 메시지 배열을 반환하면 show_form()에 전달한다
    if ($form_errors = validate_form()) {
        show_form($form_errors);
    } else {
        process_form();
    }
} else {
    show_form();
}

// 폼을 제출하면 수행하는 함수
function process_form() {
    print $_POST['my_name']. "님 안녕하세요.";
}

// 폼을 표시하는 함수
function show_form($errors = array()) {
    // 오류 메시지를 전달받으면 출력한다.
    if ($errors) {
        print '다음 항목을 수정해주세요.: <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
    }

    print<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
이름: <input type="text" name="my_name">
<br>
<input type="submit" value="인사">
</form>
_HTML_;
}

// 폼 데이터 검사
function validate_form() {
    // 오류 메시지를 담을 빈 배열 생성
    $errors = array();

    // 이름이 너무 짧으면 오류 메시지 추가
    if (strlen($_POST['my_name']) < 3) {
        $errors[ ] = '이름은 3글자 이상 입력해주세요.';
    }

    // (빈 배열일 수도 있는) 오류 메시지 배열 반환
    return $errors;
}
