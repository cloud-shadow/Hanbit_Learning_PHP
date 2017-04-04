<?php
$prices = array(5.95, 3.00, 12.50);
$total_price = 0;
$tax_rate = 1.08; // 8% 부가세율

foreach ($prices as $price) {
    $total_price = $price * $tax_rate;
}

printf('총 가격 (부가세 포함): $%.2f', $total_price);
?>
