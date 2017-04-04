<?php
$view_count = 1 + ($_COOKIE['view_count'] ?? 0);
setcookie('view_count', $view_count);
print "<p>열람 회수: $view_count.</p>";
