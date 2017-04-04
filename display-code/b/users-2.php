$view_count = 1 + ($_COOKIE['view_count'] ?? 0);

if ($view_count == 20) {
    // setcookie()에 빈값을 넣으면 쿠키가 삭제된다.
    setcookie('view_count', '');
    $msg = "<p>열람 회수가 초기화됩니다.</p>";
} else {
    setcookie('view_count', $view_count);
    $msg = "<p>열람 회수: $view_count.</p>";
    if ($view_count == 5) {
        $msg .= "<p>5번째 방문하셨습니다.</p>";
    } elseif ($view_count == 10) {
        $msg .= "<p>10번째 방문하셨습니다. 이 페이지를 좋아하시는군요.</p>";
    } elseif ($view_count == 15) {
        $msg .= "<p>15번째 방문하셨습니다. " .
            "다른 페이지가 있다는걸 모르시는건 아니죠?</p>";
    }
}
print $msg;