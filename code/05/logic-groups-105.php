<?php
$totals = restaurant_check2(15.22, 8.25, 15);

if ($totals[0] < 20) {
    print '팁을 제외한 총금액이 $20보다 적음.';
}

if ($totals[1] < 20) {
    print '팁을 포함한 총금액이 $20보다 적음.';
}