$input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT,
                             array('options' => array('min_range' => 18,
                                                      'max_range' => 65)));
if (is_null($input['age']) || ($input['age'] === false)) {
    $errors[] = '18세와 65세 사이의 나이를 입력해주세요.';
}
