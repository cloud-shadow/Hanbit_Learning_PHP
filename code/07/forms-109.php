<?php
// 댓글에서 HTML 제거하기
$comments = strip_tags($_POST['comments']);
// 이제 안전하게 $comments를 출력할 수 있음
print $comments;