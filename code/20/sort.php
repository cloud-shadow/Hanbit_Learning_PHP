<?php

// 미국식 영어
$en = new Collator('en_US');
// 덴마크어
$da = new Collator('da_DK');

$words = array('absent','åben','zero');

print "정렬 전: " . implode(', ', $words) . "\n";

$en->sort($words);
print "en_US 정렬: " . implode(', ', $words) . "\n";

$da->sort($words);
print "da_DK 정렬: " . implode(', ', $words) . "\n";
