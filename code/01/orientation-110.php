<?php
// 폼이 전송되면 인사하기
if ($_POST['user']) {
    print "Hello, ";
    // 'user'라는 폼 매개변수로 제출된 값 출력
    print $_POST['user'];
    print "!";
} else {
    // 그렇지 않다면 폼 출력
    print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
이름: <input type="text" name="user" />
<br/>
<button type="submit">인사하기</button>
</form>
_HTML_;
}
?>
