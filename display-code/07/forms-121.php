// 요청 메서드에 따라 실행할 함수를 결정하는 로직
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (validate_form()) {
        process_form();
    } else {
        show_form();
    }
} else {
    show_form();
}

// 폼을 제출하면 수행하는 함수
function process_form() {
    print $_POST['my_name']. "님 안녕하세요.";
}

// 폼을 표시하는 함수
function show_form() {
    print<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
이름: <input type="text" name="my_name">
<br>
<input type="submit" value="인사">
</form>
_HTML_;
}

// 폼 데이터 검사
function validate_form() {
    // my_name의 글자수가 3보다 작은가?
    if (strlen($_POST['my_name']) < 3) {
        return false;
    } else {
        return true;
    }
}