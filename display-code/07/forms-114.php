$sweets = array('puff' => 'Âü±ú ÆÛÇÁ',
                'square' => 'ÄÚÄÚ³Ó ¿ìÀ¯ Á©¸®',
                'cake' => 'Èæ¼³ÅÁ ÄÉÀÌÅ©',
                'ricemeat' => 'Âý½Ò °æ´Ü');

print '<select name="sweet">';
// $optionÀº optionÀÇ °ª, $labelÀº Ç¥½Ã ¸Þ´º¸íÀÌ´Ù.
foreach ($sweets as $option => $label) {
    print '<option value="' .$option .'"';
    if ($option == $defaults['sweet']) {
        print ' selected';
    }
    print "> $label</option>\n";
}
print '</select>';