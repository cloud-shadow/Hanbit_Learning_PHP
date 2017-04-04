<?php
$sweets = array('puff' => '참깨 퍼프',
                'square' => '코코넛 우유 젤리',
                'cake' => '흑설탕 케이크',
                'ricemeat' => '찹쌀 경단');

print '<select name="sweet">';
// $option은 option의 값, $label은 표시 메뉴명이다.
foreach ($sweets as $option => $label) {
    print '<option value="' .$option .'"';
    if ($option == $defaults['sweet']) {
        print ' selected';
    }
    print "> $label</option>\n";
}
print '</select>';
