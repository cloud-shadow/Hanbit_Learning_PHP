function validate_form( ) {
    $input = array();
    $errors = array( );

    // 출력 버퍼링 활성화
    ob_start();
    // 제출된 데이터를 모두 출력한다.
    var_dump($_POST);
    // 버퍼에 저장된 출력 결과를 가져온다.
    $output = ob_get_contents();
    // 출력 버퍼링을 비활성화 한다.
    ob_end_clean();
    // 제출된 데이터를 오류 로그로 전달한다.
    error_log($output);

    // op는 필수값이다.
    $input['op'] = $GLOBALS['ops'][$_POST['op']] ?? '';
    if (! in_array($input['op'], $GLOBALS['ops'])) {
        $errors[] = '연산자를 선택하세요.';
    }
    // num1과 num2는 숫자여야 한다.
    $input['num1'] = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num1']) || ($input['num1'] === false)) {
        $errors[] = '첫 번째 수를 입력하세요.';
    }

    $input['num2'] = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num2']) || ($input['num2'] === false)) {
        $errors[] = '두 번째 수를 입력하세요.';
    }

    // 0으로 나눌 수 없다.
    if (($input['op'] == '/') && ($input['num2'] == 0)) {
        $errors[] = '0으로 나눌 수 없습니다.';
    }

    return array($errors, $input);
}