$message = "In Russia, I like to eat каша and drink квас.";

print "substr()을 사용할 때: " . substr($message, 0, 30) . "\n";
print "mb_substr()을 사용할 때: " . mb_substr($message, 0, 30) . "\n";
