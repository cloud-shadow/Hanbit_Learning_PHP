<?php
// $_SESSION 을 자유롭게 사용하기 위해 세션을 활성화한다.
session_start();
?>
<html>
  <head><title>배경색 예제</title></head>
  <body style="background-color:<?= $_SESSION['background_color'] ?>">
    <p>어떤 색상을 고르셨나요?</p>
  </body>
</html>
