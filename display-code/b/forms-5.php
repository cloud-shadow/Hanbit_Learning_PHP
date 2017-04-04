function print_array($ar) {
    print '<ul>';
    foreach ($ar as $k => $v) {
        if (is_array($v)) {
            print '<li>' . htmlentities($k) .':</li>';
            print_array($v);
        } else {
            print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
        }
    }
    print '</ul>';
}

/* 폼 데이터를 처리하는 부분이므로, $input 배열 대신
$_POST 변수를 직접 사용한다. */
function process_form() {
    print_array($_POST);
}