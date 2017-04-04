<?php
$name = '이순신';
function say_hello( ) {
    print '안녕하세요, ';
    print global $name;
}
say_hello( );
?>