<?php

require 'restaurant-functions.php';

/* 음식가격 $25, 더하기 부가세 8.875%, 더하기 팁 20% */
$total_bill = restaurant_check(25, 8.875, 20);

/* 가진돈 $30 */
$cash = 30;

print "결제 방법은 " . payment_method($cash, $total_bill);