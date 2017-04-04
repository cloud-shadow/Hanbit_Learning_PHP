<?php
$filename = realpath("/usr/local/data/$_POST[user]");

// $filename이 /usr/local/data 하위에 있는지 확인하기
if (('/usr/local/data/' == substr($filename, 0, 16)) &&
    is_readable($filename)) {
    print '사용자 정보: ' . htmlentities($_POST['user']) .': <br/>';
    print file_get_contents($filename);
} else {
    print "존재하지 않는 사용자입니다.";
}
