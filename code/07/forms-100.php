<?php
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    print $_POST['my_name']. "님 안녕하세요";
} else {
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
이름: <input type="text" name="my_name" >
<br>
<input type="submit" value="인사">
</form>
_HTML_;
}
