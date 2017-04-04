<?php
$row_styles = array('even','odd');
$style_index = 0;
$meal = array('breakfast' => '호두 번',
              'lunch' => '캐슈너트와 양송이버섯',
              'snack' => '말린 오디',
              'dinner' => '칠리 소스 가지 볶음');
print "<table>\n";
foreach ($meal as $key => $value) {
    print '<tr class="' . $row_styles[$style_index] . '">';
    print "<td>$key</td><td>$value</td></tr>\n";
// $style_index 변수에 0과 1을 번갈아 지정한다.
    $style_index = 1 - $style_index;
}
print '</table>';
