$template_file = 'page-template.html';
if (is_readable($template_file)) {
    $template = file_get_contents($template_file);
} else {
    print "템플릿 파일을 읽을 수 없습니다.";
}