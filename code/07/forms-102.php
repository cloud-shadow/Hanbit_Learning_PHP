<?php
if (strlen(trim($_POST['name'])) == 0) {
    $errors[] = "이름을 입력해주세요.";
}
