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

// 맵기 선택 값
$spicy_choices = array('no','yes','either');

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
    // 기본값 설정
    $defaults = array('min_price' => '5.00',
                      'max_price' => '25.00');

    // 우선시되는 기본값으로 $form 객체 생성
    $form = new FormHelper($defaults);

    // 폼을 표시하는 모든 HTML은 명확성을 위해 분리된 파일에 둔다.
    include 'retrieve-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // 메뉴 이름 시작과 끝의 화이트스페이스 제거
    $input['dish_name'] = trim($_POST['dish_name'] ?? '');

    // 최저 가격은 올바른 부동소수점 수여야 한다.
    $input['min_price'] = filter_input(INPUT_POST,'min_price',
                                       FILTER_VALIDATE_FLOAT);
    if ($input['min_price'] === null || $input['min_price'] === false) {
        $errors[] = '최저 가격을 올바르게 입력해주세요.';
    }

    // 최대 가격은 올바른 부동소수점 수여야 한다.
    $input['max_price'] = filter_input(INPUT_POST,'max_price',
                                       FILTER_VALIDATE_FLOAT);
    
    if ($input['max_price'] === null || $input['max_price'] === false) {
        $errors[] = '최대 가격을 올바르게 입력해주세요.';
    }

// 최저 가격은 최대 가격보다 낮아야 한다.
    if ($input['min_price'] >= $input['max_price']) {
        $errors[] = '최소 가격은 최대 가격보다 낮아야 합니다.';
    }

    $input['is_spicy'] = $_POST['is_spicy'] ?? '';
    if (! array_key_exists($input['is_spicy'], $GLOBALS['spicy_choices'])) {
        $errors[] = '올바른 "맵기"를 선택해주세요.';
    }
    return array($errors, $input);
}

function process_form($input) {
    // 함수 내부에서 전역 변수 $db에 접근하기 위해 global로 선언한다.
    global $db;

    // 쿼리 생성
    $sql = 'SELECT dish_name, price, is_spicy FROM dishes WHERE price >= ? AND price <= ?';

    // 메뉴명이 제출되면 WHERE 절에 추가한다.
    // 사용자가 입력한 와일드카드가 쿼리에 영향을 미치지 못하도록
    if (strlen($input['dish_name'])) {
        $dish = $db->quote($input['dish_name']);
        $dish = strtr($dish, array('_' => '\_', '%' => '\%'));
        $sql .= " AND dish_name LIKE $dish";
    }

    // is_spicy가 "yes" 또는 "no"일 때 SQL에 추가
    // ("either"일 때는 WHERE 절에 is_spicy 조건을 추가할 필요 없음)
    $spicy_choice = $GLOBALS['spicy_choices'][ $input['is_spicy'] ];
    if ($spicy_choice == 'yes') {
        $sql .= ' AND is_spicy = 1';
    } elseif ($spicy_choice == 'no') {
        $sql .= ' AND is_spicy = 0';
    }

    // 데이터베이스 프로그램에 쿼리를 전송하고 결과 돌려받기
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['min_price'], $input['max_price']));
    $dishes = $stmt->fetchAll();

    if (count($dishes) == 0) {
        print '발견된 메뉴가 없습니다.';
    } else {
        print '<table>';
        print '<tr><th>메뉴명</th><th>Price</th><th>맵기</th></tr>';
        foreach ($dishes as $dish) {
            if ($dish->is_spicy == 1) {
                $spicy = 'Yes';
            } else {
                $spicy = 'No';
            }
            printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>', htmlentities($dish->dish_name), $dish->price, $spicy);
        }
    }
}
?>
