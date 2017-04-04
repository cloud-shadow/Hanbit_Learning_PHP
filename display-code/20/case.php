$english = "Please stop shouting.";
$danish = "Venligst stoppe råben.";
$vietnamese = "Hãy dừng la hét.";

print "strtolower()을 사용할 때: \n";
print "   " . strtolower($english) . "\n";
print "   " . strtolower($danish) . "\n";
print "   " . strtolower($vietnamese) . "\n";

print "mb_strtolower()을 사용할 때: \n";
print "   " . mb_strtolower($english) . "\n";
print "   " . mb_strtolower($danish) . "\n";
print "   " . mb_strtolower($vietnamese) . "\n";

print "strtoupper()을 사용할 때: \n";
print "   " . strtoupper($english) . "\n";
print "   " . strtoupper($danish) . "\n";
print "   " . strtoupper($vietnamese) . "\n";

print "mb_strtoupper()을 사용할 때: \n";
print "   " . mb_strtoupper($english) . "\n";
print "   " . mb_strtoupper($danish) . "\n";
print "   " . mb_strtoupper($vietnamese) . "\n";