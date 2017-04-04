$row_styles = array('even','odd');
$dinner = array('스위트콘과 아스파라거스',
                '레몬 치킨',
                '삶은 망태버섯');
print "<table>\n";

for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
    print '<tr class="' . $row_styles[$i % 2] . '">';
    print "<td>원소 $i</td><td>$dinner[$i]</td></tr>\n";
}
print '</table>';
