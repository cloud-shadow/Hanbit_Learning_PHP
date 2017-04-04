$page_title = '메뉴';
$meat = '돼지고기';
$vegetable = '숙주나물';
print <<<MENU
<html>
<head><title>$page_title</title></head>
<body>
<ul>
<li> $meat 바베큐
<li> 저민 $meat
<li> $meat 조림과 $vegetable
</ul>
</body>
</html>
MENU;