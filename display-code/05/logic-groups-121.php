// 선택적 인수가 하나일 때. 마지막 인수여야 한다.
function page_header5($color, $title, $header = '어서오세요') {
    print '<html><head><title>' . $title . '에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// 올바른 호출 방법
page_header5('66cc99','저의 멋진 홈페이지'); // $header의 기본값을 사용한다.
page_header5('66cc99','저의 멋진 홈페이지','홈페이지 최고에요!'); // 기본값을 사용하지 않는다.

// 선택적 인수가 두 개일 때. 마지막 두 인수에 지정해야 한다.
function page_header6($color, $title = '저의 홈페이지', $header = '어서오세요') {
    print '<html><head><title>' . $title . '에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// 올바른 호출 방법
page_header6('66cc99'); // $title과 $header의 기본값을 사용한다.
page_header6('66cc99','저의 멋진 홈페이지 '); // $header의 기본값을 사용한다.
page_header6('66cc99','저의 멋진 홈페이지 ','홈페이지 최고에요!'); // 기본값을 사용하지 않는다.

// 인수가 모두 선택적일 때
function page_header7($color = '336699', $title = '저의 홈페이지', $header = '어서오세요') {
    print '<html><head><title>' . $title . '에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}

// 올바른 호출 방법
page_header7(); // 모두 기본값을 사용한다.
page_header7('66cc99'); // $title과 $header의 기본값을 사용한다.
page_header7('66cc99','저의 멋진 홈페이지'); // $header의 기본값을 사용한다.
page_header7('66cc99','저의 멋진 홈페이지','홈페이지 최고에요!'); // 기본값을 사용하지 않는다.