<?php
// $_POST['zipcode']는 폼 매개변수 "zipcode"로 제출된 값을 담는다.
$zipcode = trim($_POST['zipcode']);
// 이제 $zipcode는 시작이나 끝에 있는 공백이
// 제거된 값을 담는다.
$zip_length = strlen($zipcode);
// 우편번호가 5자리가 아니면 문제를 제기한다.
if ($zip_length != 5) {
    print "우편번호를 5자리로 입력해주세요.";
}