$fmtfavs = new MessageFormatter('en_GB', $messages['en_GB']['FAVORITE_FOODS']);
$fmtcookie = new MessageFormatter('en_GB', $messages['en_GB']['COOKIE']);

// "biscuit"을 반환한다.
$cookie = $fmtcookie->format(array());

// "biscuit"이 포함된 문장을 출력한다.
print $fmtfavs->format(array($cookie));
