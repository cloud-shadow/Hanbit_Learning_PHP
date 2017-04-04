session_start();

// 이 파일과 FormHelper.php 파일은 같은 디렉터리에 있어야 한다.
require 'FormHelper.php';

// select 메뉴의 선택 항목 배열 생성
// 이 배열은 display_form(), validate_form(),process_form()에서 사용되므로
// 전역 영역에 선언한다.
$products = [ 'cuke' => '데친 해삼',
              'stomach' => '"순대"',
              'tripe' => '와인 소스 양대창',
              'taro' => '돼지고기 토란국',
              'giblets' => '곱창 소금 구이',
              'abalone' => '전복 호박 볶음'];

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
    global $products;
    $defaults = array();
    // 기본값을 0으로 설정한다.
    foreach ($products as $code => $label) {
        $defaults["quantity_$code"] = 0;
    }
    // 세션에 수량이 저장되어있으면 저장된 값을 사용한다.
    if (isset($_SESSION['quantities'])) {
        foreach ($_SESSION['quantities'] as $field => $quantity) {
            $defaults[$field] = $quantity;
        }
    }
    $form = new FormHelper($defaults);
    // 폼을 표시하는 모든 HTML은 명확성을 위해 분리된 파일에 둔다.
    include 'order-form.php';
}

function validate_form( ) {
    global $products;

    $input = array();
    $errors = array( );

    // 모든 수량은 0 이상이어야 한다.
    foreach ($products as $code => $name) {
        $field = "quantity_$code";
        $input[$field] = filter_input(INPUT_POST, $field,
                                      FILTER_VALIDATE_INT,
                                      ['options' => ['min_range'=>0]]);
        if (is_null($input[$field]) || ($input[$field] === false)) {
            $errors[] = "$name 의 수량을 올바르게 입력해주세요.";
        }
    }

    return array($errors, $input);
}

function process_form($input) {
    $_SESSION['quantities'] = $input;
    print "주문해주셔서 감사합니다.";
}
