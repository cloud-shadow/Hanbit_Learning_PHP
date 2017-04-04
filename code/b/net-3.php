<?php

// 1970년 1월 1일 이후 현재까지 흐른 초
$now = time();
setcookie('last_access', $now);
if (isset($_COOKIE['last_access'])) {
    // 1970년 1월 1일 이후 현재까지 흐른 초를 이용해 DateTime 객체를 생성하려면
    // 초 숫자 앞에 @를 붙인다.
    $d = new DateTime('@'. $_COOKIE['last_access']);
    $msg = '<p>마지막으로 방문한 시각: ' .
         $d->format('g:i a') . ' on ' .
         $d->format('F j, Y') . '</p>';
} else {
    $msg = '<p>이 페이지에 처음 방문하셨습니다.</p>';
}

print $msg;
