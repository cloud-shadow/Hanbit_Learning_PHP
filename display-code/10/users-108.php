function validate_form( ) {
    global $db;
    $input = array();
    $errors = array();

    // 이 변수는 제출된 비밀번호가 일치할 때만 true로 설정된다.
    $password_ok = false;

    $input['username'] = $_POST['username'] ?? '';
    $submitted_password = $_POST['password'] ?? '';

    $stmt = $db->prepare('SELECT password FROM users WHERE username = ?');
    $stmt->execute($input['username']);
    $row = $stmt->fetch();
    // 반환된 로우가 없으면, 존재하지 않는 사용자명이다.
    if ($row) {
        $password_ok = password_verify($submitted_password, $row[0]);
    }
    if (! $password_ok) {
        $errors[] = '올바른 사용자명과 비밀번호를 입력해주세요.';
    }

    return array($errors, $input);
}