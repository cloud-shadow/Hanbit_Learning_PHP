<?php
// 출력 내용을 가로챈다.
ob_start( );
// 평소처럼 var_dump() 호출한다.
var_dump($_POST);
// ob_start()를 호출한 뒤 출력된 내용을 $output에 저장한다.
$output = ob_get_contents( );
// 일반적인 출력으로 되돌린다.
ob_end_clean( );
// $output을 오류 로그로 보낸다.
error_log($output);