if ('POST' == $_SERVER['REQUEST_METHOD']) {
    print $_POST['my_name']. "¥‘ æ»≥Á«œººø‰";
} else {
    print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
¿Ã∏ß: <input type="text" name="my_name" >
<br>
<input type="submit" value="¿ŒªÁ">
</form>
_HTML_;
}
