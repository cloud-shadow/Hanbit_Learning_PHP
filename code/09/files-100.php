<?php
// 앞선 예제의 템플릿 파일 불러오기
$page = file_get_contents('page-template.html');

// 페이지 제목 삽입
$page = str_replace('{page_title}', '환영합니다', $page);

// 아침에는 초록색, 오후에는 파란색으로 페이지 배경색 바꾸기
if (date('H' >= 12)) {
    $page = str_replace('{color}', 'blue', $page);
} else {
    $page = str_replace('{color}', 'green', $page);
}

// 이전에 세션변수로 저장된 사용자명 가져오기
$page = str_replace('{name}', $_SESSION['username'], $page);

// 결과 출력
print $page;