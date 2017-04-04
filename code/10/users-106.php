<?php
session_start( );

if (array_key_exists('username', $_SESSION)) {
    print "안녕하세요, $_SESSION[username].";
} else {
    print '가입 후 이용하실 수 있습니다.';
}
?>