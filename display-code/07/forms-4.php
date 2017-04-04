$input['order'] = $_POST['order'];
if (! in_array($input['order'], $GLOBALS['sweets'])) {
    $errors[] = '주문 가능한 메뉴가 아닙니다.';
}
