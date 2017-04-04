<table>
<tr><th>City</th><th>Population</th></tr>
<?php
// $census의 각 원소는 도시명, 소속 도, 인구 등의
// 세 개의 원소를 지닌 배열이다.
$census = [ ['Suwon', 'GG', 1194313],
            ['Changwon', 'GN', 1059241],
            ['Goyang', 'GG', 990073],
            ['Yongin', 'GG', 971327],
            ['Cheongju', 'CB', 833276],
            ['Jeonju', 'JB', 658172],
            ['Cheonan', 'CN', 629062],
            ['Gimhae', 'GN', 534124],
            ['Pohang', 'GB', 511804],
            ['Jinju', 'GN', 349788] ];

$total = 0;
$state_totals = array();
foreach ($census as $city_info) {
    // 총 인구 수에 더한다.
    $total += $city_info[2];
    // 처음 나온 도는
    // 총 인구 수를 0으로 초기화한다.
    if (! array_key_exists($city_info[1], $state_totals)) {
        $state_totals[$city_info[1]] = 0;
    }
    // 도별 총 인구 수에 더한다.
    $state_totals[$city_info[1]] += $city_info[2];
    print "<tr><td>$city_info[0], $city_info[1]</td><td>$city_info[2]</td></tr>\n";
}
print "<tr><td>합계</td><td>$total</td></tr>\n";
// 도별 총 인구 수를 출력한다
foreach ($state_totals as $state => $population) {
    print "<tr><td>$state</td><td>$population</td></tr>\n";
}
print "</table>";
