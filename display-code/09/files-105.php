if (file_exists('/usr/local/htdocs/index.html')) {
    print "인덱스 파일이 존재합니다.";
} else {
    print "/usr/local/htdocs에 인덱스 파일이 없습니다.";
}