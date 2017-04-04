$input['order'] = $_POST['order'];
if (! array_key_exists($input['order'], $GLOBALS['sweets'])) {
    $errors[] = '주문 가능한 메뉴가 아닙니다.';
}
