function validate_form( ) {
    $input = array();
    $errors = array();
    // 예시 사용자와 해시 비밀번호
    $users = array('alice' =>
        '$2y$10$N47IXmT8C.sKUFXs1EBS9uJRuVV8bWxwqubcvNqYP9vcFmlSWEAbq',
                   'bob' =>
        '$2y$10$qCczYRc7S0llVRESMqUkGeWQT4V4OQ2qkSyhnxO0c.fk.LulKwUwW',
                   'charlie' =>
        '$2y$10$nKfkdviOBONrzZkRq5pAgOCbaTFiFI6O2xFka9yzXpEBRAXMW5mYi');

    // 사용자명이 존재하는지 확인
    if (! array_key_exists($_POST['username'], $users)) {
        $errors[ ] = '올바른 사용자명과 비밀번호를 입력해주세요.';
    }
    else {
    // 비밀번호가 일치하는지 확인
        $saved_password = $users[ $input['username'] ];
        $submitted_password = $_POST['password'] ?? '';
        if (! password_verify($submitted_password, $saved_password)) {
            $errors[ ] = '올바른 사용자명과 비밀번호를 입력해주세요.';
        }
    }

    return array($errors, $input);
}