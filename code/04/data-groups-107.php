<?php
$dishes['Beef Chow Foon'] = 12;
$dishes['Beef Chow Foon']++;
$dishes['Roast Duck'] = 3;

$dishes['total'] = $dishes['Beef Chow Foon'] + $dishes['Roast Duck'];

if ($dishes['total'] > 15) {
    print "많이도 먹었군";
}

print 'Beef Chow Foon 메뉴를 총 ' . $dishes['Beef Chow Foon'] . ' 그릇 드셨습니다.';