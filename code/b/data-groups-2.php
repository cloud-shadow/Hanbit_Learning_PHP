<?php
$census = ['Suwon, GG' => 1194313,
           'Changwon, GN' => 1059241,
           'Goyang, GG' => 990073,
           'Yongin, GG' => 971327,
           'Cheongju, CB' => 833276,
           'Jeonju, JB' => 658172,
           'Cheonan, CN' => 629062,
           'Gimhae, GN' => 534124,
           'Pohang, GB' => 511804,
           'Jinju, GN' => 349788];

// 값을 기준으로 연관 배열을 정렬한다.
asort($census);

print "<table>\n";
print "<tr><th>도시</th><th>인구</th></tr>\n";
$total = 0;
foreach ($census as $city => $population) {
    $total += $population;
    print "<tr><td>$city</td><td>$population</td></tr>\n";
}
print "<tr><td>합계</td><td>$total</td></tr>\n";
print "</table>";

// 키를 기준으로 연관 배열을 정렬한다.
ksort($census);

print "<table>\n";
print "<tr><th>도시</th><th>인구</th></tr>\n";

$total = 0;
foreach ($census as $city => $population) {
    $total += $population;
    print "<tr><td>$city</td><td>$population</td></tr>\n";
}
print "<tr><td>합계</td><td>$total</td></tr>\n";
print "</table>";
