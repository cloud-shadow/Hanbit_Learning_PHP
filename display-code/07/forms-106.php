$sweets = array('puff' => 'Âü±ú ÆÛÇÁ',
                'square' => 'ÄÚÄÚ³Ó ¿ìÀ¯ Á©¸®',
                'cake' => 'Èæ¼³ÅÁ ÄÉÀÌÅ©',
                'ricemeat' => 'Âý½Ò °æ´Ü');

function generate_options_with_value ($options) {
    $html = '';
    foreach ($options as $value => $option) {
        $html .= "<option value=\"$value\">$option</option>\n";
    }
    return $html;
}


// ÆûÀ» Ç¥½ÃÇÏ´Â ÇÔ¼ö
function show_form( ) {
    $sweets = generate_options_with_value($GLOBALS['sweets']);
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
¸Þ´º ¼±ÅÃ: <select name="order">
$sweets
</select>
<br/>
<input type="submit" value="ÁÖ¹®">
</form>
_HTML_;
}