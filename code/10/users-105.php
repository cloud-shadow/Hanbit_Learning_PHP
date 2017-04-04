<?php
require 'FormHelper.php';
session_start( );

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}

function show_form($errors = array()) {
    // 처음에는 아무런 값도 없으므로
    // FormHelper 생성자에 아무것도 전달하지 않는다.
    $form = new FormHelper();

    // 나중에 사용할 오류 출력 HTML 생성
    if ($errors) {
        $errorHtml = '<ul><li>';
        $errorHtml .= implode('</li><li>',$errors);
        $errorHtml .= '</li></ul>';
    } else {
        $errorHtml = '';
    }


// 간단한 폼이므로, 컴포넌트로 분리하지 않고 여기에서 바로 출력한다.
print <<<_FORM_
<form method="POST" action="{$form->encode($_SERVER['PHP_SELF'])}">
  $errorHtml
  사용자명: {$form->input('text', ['name' => 'username'])} <br/>
  비밀번호: {$form->input('password', ['name' => 'password'])} <br/>
  {$form->input('submit', ['value' => '로그인'])}
</form>
_FORM_;
}

function validate_form( ) {
    $input = array();
    $errors = array();

    // 예시 사용자명과 비밀번호
    $users = array('alice'   => 'dog123',
                   'bob'     => 'my^pwd',
                   'charlie' => '**fun**');

    // 사용자명이 존재하는지 확인
    $input['username'] = $_POST['username'] ?? '';
    if (! array_key_exists($input['username'], $users)) {
        $errors[] = '올바른 사용자명과 비밀번호를 입력해주세요.';
    }
    // else 이후는 사용자명이 존재할 경우에만 실행되고
    // 그렇지 않으면 실행되지 않는다.
    else {
    // 비밀번호가 일치하는지 확인
        $saved_password = $users[ $input['username'] ];
        $submitted_password = $_POST['password'] ?? '';
        if ($saved_password != $submitted_password) {
            $errors[] = '올바른 사용자명과 비밀번호를 입력해주세요.';
        }
    }
    return array($errors, $input);
}


function process_form($input) {
// 사용자명을 세션에 넣기
    $_SESSION['username'] = $input['username'];

    print "안녕하세요, $_SESSION[username]";
}
?>
