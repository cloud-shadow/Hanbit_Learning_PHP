<?php

// 폼 헬퍼 클래스 불러오기
require 'FormHelper.php';

// 데이터베이스 접속
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (PDOException $e) {
    print "접속할 수 없습니다: " . $e->getMessage();
    exit();
}
// DB 오류 예외 설정
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 객체 방식으로 가져오기
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// 메뉴 ID와 이름은 show_form()과 validate_form()에서 사용해야 하므로
// 전역 배열로 선언한다.
$dishes = array();
$sql = 'SELECT dish_id, dish_name FROM dishes ORDER BY dish_name';
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
    $dishes[$row->dish_id] = $row->dish_name;
}

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
    global $db, $dishes;

    // 우선시되는 기본값으로 $form 객체 생성
    $form = new FormHelper();

    // 폼을 표시하는 모든 HTML은 명확성을 위해 분리된 파일에 둔다.
    include 'customer-form.php';
}

function validate_form() {
    global $dishes;
    $input = array();
    $errors = array();

    // 제출된 dish_id가 $dishes에 포함됐는지 확인한다.
    // dish_id 값이 제출되면 일단 정상으로 판단한다.
    // 해당하는 dish_id가 데이터베이스에 없으면
    // process_form()를 통해 dish_id 입력 요청 메시지를 출력한다.
    $input['dish_id'] = $_POST['dish_id'] ?? '';
    if (! array_key_exists($input['dish_id'], $dishes)) {
        $errors[] = '올바른 메뉴를 선택하세요.';
    }

    // 이름은 필수 항목이다.
    $input['name'] = trim($_POST['name'] ?? '');
    if (0 == strlen($input['name'])) {
        $errors[] = '이름을 입력하세요.';
    }

    // 전화번호는 필수 항목이다.
    $input['phone'] = trim($_POST['phone'] ?? '');
    if (0 == strlen($input['phone'])) {
        $errors[] = '전화번호를 입력하세요.';
    } else {
        // 전화번호는 최소한9 자리 이상이다
        // 각 문자에c type_digit()을 적용하는 방식은 효율적이지 못하지만
        // 논리적으로 직관적이고,
        // 정규식을 쓸 필요가 없어서
        // 나쁘지 않은 방법이다.
        $digits = 0;
        for ($i = 0; $i < strlen($input['phone']); $i++) {
            if (ctype_digit($input['phone'][$i])) {
                $digits++;
            }
        }
        if ($digits < 9) {
            $errors[] = '전화번호는 최소한 9자리 이상 입력해주세요.';
        }
    }

    return array($errors, $input);
}

function process_form($input) {
    // 함수 내부에서 전역 변수 $db에 접근하기 위해 global로 선언한다.
    global $db;

    // 데이터베이스가 자동으로 유일값을 생성하므로,
    // 쿼리를 생성할 때 특정한 customer_id를 지정할 필요가 없다.
    $sql = 'INSERT INTO customers (name,phone,favorite_dish_id) ' .
           'VALUES (?,?,?)';

    // 데이터베이스 프로그램에 쿼리를 전송하고 결과 돌려받기
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute(array($input['name'],$input['phone'],$input['dish_id']));
        print '<p>신규 고객 등록.</p>';
    } catch (Exception $e) {
        print "<p>고객을 등록할 수 없습니다: {$e->getMessage()}.</p>";
    }
}
?>