<?php
function payment_method($cash_on_hand, $amount) {
    if ($amount > $cash_on_hand) {
        return '신용카드';
    } else {
        return '현금';
    }
}