$sweets = array('참깨 퍼프','코코넛 우유 젤리',
    '흑설탕 케이크','찹쌀 경단');

function generate_options($options) {
    $html = '';
    foreach ($options as $option) {
        $html .= "<option>$option</option>\n";
    }
    return $html;
}

// 폼을 표시하는 함수
function show_form() {
    $sweets = generate_options($GLOBALS['sweets']);
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
메뉴 선택: <select name="order">
$sweets
</select>
<br/>
<input type="submit" value= "주문">
</form>
_HTML_;
}