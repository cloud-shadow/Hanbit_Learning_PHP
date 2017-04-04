$daysToPrint = 4;
$d = new DateTime('next Tuesday');
print "<select name='day'>\n";
for ($i = 0; $i < $daysToPrint; $i++) {
    print "  <option>" . $d->format('l F jS') . "</option>\n";
    // 현재 날짜에 2일을 더한다.
    $d->modify("+2 day");
}
print "</select>";