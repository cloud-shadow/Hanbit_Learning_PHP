<?php

$fh = fopen('dishes.csv','rb');
if (! $fh) {
    die("dishes.csv 파일을 열 수 없습니다: $php_errormsg");
}
print "<table>\n";
while ((! feof($fh)) && ($line = fgetcsv($fh))) {
    // implode()로 결합한다.
    print "<tr><td>" . implode("</td><td>", $line) . "</td></tr>\n";
}
print "</table>";
