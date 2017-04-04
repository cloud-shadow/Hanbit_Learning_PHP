<?php

// 이 파일과 FormHelper.php 파일은
// 같은 디렉터리에 있어야 한다.
require 'FormHelper.php';

// select 메뉴의 선택 항목 배열 생성
// 이 배열은 display_form(), validate_form(),process_form()에서 사용되므로
// 전역 영역에 선언한다.
$states = [ '서울특별시','인천광역시','부산광역시','광주광역시','대전광역시',
'대구광역시','울산광역시','세종특별자치시','제주특별자치도','경기도','강원도',
'경상북도','경상남도','충청북도','충청남도','전라북도','전라남도'];

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
    }
} else {
    // 폼이 제출되지 않았으면 폼을 출력한다.
    show_form();
}

function show_form($errors = array()) {
    // 기본값을 이용해 $form 객체를 생성한다.
    $form = new FormHelper();

    // 폼 출력과 관련된 모든 HTML은 별도의 파일로 완전히 분리한다.
    include 'shipping-form.php';
}

function validate_form( ) {
    $input = array();
    $errors = array( );

    foreach (['from','to'] as $addr) {
    // 필수 항목을 검사한다.
        foreach (['Name' => 'name', 'Address 1' => 'address1',
                  'State' => 'state'] as $label => $field){
            $input[$addr.'_'.$field] = $_POST[$addr.'_'.$field] ?? '';
            if (strlen($input[$addr.'_'.$field]) == 0) {
                $errors[] = "$addr , $label 값을 입력하세요.";
            }
        }
        /// 광역시도 확인
        $input[$addr.'_state'] =
            $GLOBALS['states'][$input[$addr.'_state']] ?? '';
        if (! in_array($input[$addr.'_state'], $GLOBALS['states'])) {
            $errors[] = "$addr 광역시도를 선택하세요.";
        }
        // 우변번호 검사
        $input[$addr.'_zip'] = filter_input(INPUT_POST, $addr.'_zip',
                                            FILTER_VALIDATE_INT,
                                            ['options' => ['min_range'=>10000,
                                                          'max_range'=>99999]]);
        if (is_null($input[$addr.'_zip']) || ($input[$addr.'_zip']===false)) {
            $errors[] = "올바른 $addr 우편번호를 입력하세요 ";
        }
        // 추가 주소도 잊지 말것!
        $input[$addr.'_address2'] = $_POST[$addr.'_address2'] ?? '';
   }

    // 높이, 길이, 깊이, 무게는 0보다 크다.
    foreach(['height','width','depth','weight'] as $field) {
        $input[$field] =filter_input(INPUT_POST, $field, FILTER_VALIDATE_FLOAT);
        // 0이 될 수 없는 항목이며
        // null이나 false도 될 수 없다.
        if (! ($input[$field] && ($input[$field] > 0))) {
            $errors[] = "$field 값을 올바르게 입력해주세요.";
        }
    }
    // 무게 검사
    if ($input['weight'] > 150) {
        $errors[] = "화물의 무게는 150 이하여야 합니다.";
    }
    // 부피 검사
    foreach(['height','width','depth'] as $dim) {
        if ($input[$dim] > 36) {
            $errors[] = "화물의 $dim 값이 36 이하여야 합니다.";
        }
    }

    return array($errors, $input);
}

function process_form($input) {
    // 출력 템플릿 생성.
    $tpl=<<<HTML
<p>화물 크기: {height}" x {width}" x {depth}", 무게: {weight} lbs.</p>

<p>출발지:</p>
<pre>
{from_name}
{from_address}
{from_state} {from_zip}
</pre>

<p>배송지:</p>
<pre>
{to_name}
{to_address}
{to_state} {to_zip}
</pre>
HTML;

    // $input 배열의 주소를 보기 좋게 가공한다.
    foreach(['from','to'] as $addr) {
        $input[$addr.'_address'] = $input[$addr.'_address1'];
        if (strlen($input[$addr.'_address2'])) {
            $input[$addr.'_address'] .= "\n" . $input[$addr.'_address2'];
        }
    }

    // 템플릿의 각 요소에 해당하는 값을
    // $input 배열에서 찾아서 교체한다.
    $html = $tpl;
    foreach($input as $k => $v) {
        $html = str_replace('{'.$k.'}', $v, $html);
    }

    // 화물 정보 출력
    print $html;
}
?>