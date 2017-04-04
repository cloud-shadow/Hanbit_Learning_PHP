<?php
setcookie('userid','ralph');
?>
<html><head><title>쿠키 사용 페이지</title></head>
<body>
setcookie()가 있는 PHP 블록이 모든 HTML보다 먼저 나오기 때문에
이 페이지는 쿠키가 올바르게 설정됩니다.
</body></html>