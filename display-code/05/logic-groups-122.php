function countdown($top) {
    while ($top > 0) {
        print "$top..";
        $top--;
    }
    print "Æã!\n";
}

$counter = 5;
countdown($counter);
print "counterÀÇ °ª: $counter";