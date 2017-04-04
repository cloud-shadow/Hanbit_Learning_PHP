<?php
$specials = array( array('체스트넛 번', '호두 번', '땅콩 번'),
                   array('체스트넛 샐러드','호두 샐러드', '땅콩 샐러드') );

// $num_specials은 $specials의 첫 번째 차원의 원소의 개수이므로 2다.
for ($i = 0, $num_specials = count($specials); $i < $num_specials; $i++) {
// $num_sub은 각 하위배열의 원소의 개수이므로 3이다.
    for ($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++) {
        print "Element [$i][$m]은 {$specials[$i][$m]}입니다.\n";
    }
}