$meal = array('breakfast' => '호두 번',
              'lunch' => '캐슈너트와 양송이버섯',
              'snack' => '말린 오디',
              'dinner' => '칠리 소스 가지 볶음');
print "<table>\n";
foreach ($meal as $key => $value) {
    print "<tr><td>$key</td><td>$value</td></tr>\n";
}
print '</table>';