<?php
// [예제 9-1]의 파일 불러오기
$page = file_get_contents('page-template.html');

// 페이지 제목 삽입
$page = str_replace('{page_title}', 'Welcome', $page);

// 아침에는 초록색, 오후에는 파란색으로 페이지 배경색 바꾸기
if (date('H' >= 12)) {
    $page = str_replace('{color}', 'blue', $page);
} else {
    $page = str_replace('{color}', 'green', $page);
}

// 이전에 세션변수로 저장된 사용자명 가져오기
$page = str_replace('{name}', $_SESSION['username'], $page);

$result = file_put_contents('page.html', $page);
// file_put_contents()가 false 또는 -1을 반환하는지 확인
if (($result === false) || ($result == -1)) {
    print "HTML을 page.html에 저장할 수 없습니다.";
}
