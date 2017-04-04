<?php
require 'FormHelper.php';

session_start( );

$main_dishes = array('cuke' => '데친 해삼',
                     'stomach' => "순대",
                     'tripe' => '와인 소스 양대창',
                     'taro' => '돼지고기 토란국',
                     'giblets' => '곱창 소금 구이',
                     'abalone' => '전복 호박 볶음');

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


    // 간단한 폼이므로, 출력 컴포넌트를 여기에서 바로 출력한다.
print <<<_FORM_
<form method="POST" action="{$form->encode($_SERVER['PHP_SELF'])}">
  $errorHtml
  메뉴: {$form->select($GLOBALS['main_dishes'],['name' => 'dish'])} <br/>

  수량: {$form->input('text',['name' => 'quantity'])} <br/>

  {$form->input('submit',['value' => '주문하기'])}
</form>
_FORM_;
}

function validate_form() {
    $input = array();
    $errors = array();
    // 선택된 메뉴가 올바른 메뉴인지 확인
    $input['dish'] = $_POST['dish'] ?? '';
    if (! array_key_exists($input['dish'], $GLOBALS['main_dishes'])) {
        $errors[] = '올바른 메뉴를 선택해주세요.';
    }

    $input['quantity'] = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT,
                                      array('options' => array('min_range' => 1)));
    if (($input['quantity'] === false) || ($input['quantity'] === null)) {
        $errors[] = '수량을 입력해주세요.';
    }
    return array($errors, $input);
}

function process_form($input) {
    $_SESSION['order'][] = array('dish'     => $input['dish'],
                                 'quantity' => $input['quantity']);

    print '주문이 완료되었습니다.';
}
?>