<?php
$hamburger = 4.95;
$shake = 1.95;
$cola = 0.85;

$tip_rate = 0.16;
$tax_rate = 0.075;

$food = (2 * $hamburger) + $shake + $cola;
$tip = $food * $tip_rate;
$tax = $food * $tax_rate;

$total = $food + $tip + $tax;
printf("%-9s \$%.2f %d개: \$%5.2f\n", '햄버거', $hamburger, 2, 2 * $hamburger);
printf("%-9s \$%.2f %d개: \$%5.2f\n", '쉐이크', $shake, 1, $shake);
printf("%-9s \$%.2f %d개: \$%5.2f\n", '콜라', $cola, 1, $cola);
printf("%25s: \$%5.2f\n", '음식 가격 합계', $food);
printf("%25s: \$%5.2f\n", '음식 가격, 부가세 합계', $food + $tax);
printf("%25s: \$%5.2f\n", '음식 가격, 부가세, 팁 합계', $total);