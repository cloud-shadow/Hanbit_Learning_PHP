<?php
function countdown($top) {
    while ($top > 0) {
        print "$top..";
        $top--;
    }
    print "펑!\n";
}

$counter = 5;
countdown($counter);
print "counter의 값: $counter";