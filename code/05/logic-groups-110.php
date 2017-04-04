<?php
function complete_bill($meal, $tax, $tip, $cash_on_hand) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    if ($total_amount > $cash_on_hand) {
        // 계산금액이 가진돈보다 많음
        return false;
    } else {
        // 이정도는 낼 수 있음
        return $total_amount;
    }
}

if ($total = complete_bill(15.22, 8.25, 15, 20)) {
    print "$total 정도면 딱 좋지.";
} else {
    print "제가 돈이 없어서 그러는데, 대신 접시라도 닦으면 안될까요?";
}