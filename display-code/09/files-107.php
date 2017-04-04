$log_file = '/var/log/users.log';
if (is_writeable($log_file)) {
    $fh = fopen($log_file,'ab');
    fwrite($fh, $_SESSION['username'] . ' at ' . strftime('%c') . "\n");
    fclose($fh);
} else {
    print "로그 파일을 쓸 수 없습니다.";
}