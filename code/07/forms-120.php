<?php
// 요청 메서드에 따라 실행할 함수를 결정하는 로직
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    process_form( );
} else {
    show_form( );
}

// 폼을 제출하면 수행하는 함수
function process_form( ) {
    print $_POST['my_name']. "님 안녕하세요.";
}

// 폼을 표시하는 함수
function show_form( ) {
    print<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
이름: <input type="text" name="my_name">
<br>
<input type="submit" value="인사">
</form>
_HTML_;
}
