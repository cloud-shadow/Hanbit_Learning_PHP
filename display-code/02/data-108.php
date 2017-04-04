$price = 3.95;
$tax_rate = 0.08;
$tax_amount = $price * $tax_rate;
$total_cost = $price + $tax_amount;

$username = 'james';
$domain = '@example.com';
$email_address = $username . $domain;

print '세금은 ' .$tax_amount;
print "\n"; // 줄바꿈을 출력한다.
print '총 가격은 ' .$total_cost;
print "\n"; // 줄바꿈을 출력한다.
print $email_address;