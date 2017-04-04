$dishes['Beef Chow Foon'] = 12;
$dishes['Beef Chow Foon']++;
$dishes['Roast Duck'] = 3;

$dishes['total'] = $dishes['Beef Chow Foon'] + $dishes['Roast Duck'];

if ($dishes['total'] > 15) {
    print "¸¹ÀÌµµ ¸Ô¾ú±º";
}

print 'Beef Chow Foon ¸Þ´º¸¦ ÃÑ ' . $dishes['Beef Chow Foon'] . ' ±×¸© µå¼Ì½À´Ï´Ù.';