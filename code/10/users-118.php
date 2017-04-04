<?php
session_start();

if (isset($_SESSION['count'])) {
    $_SESSION['count'] = $_SESSION['count'] + 1;
} else {
    $_SESSION['count'] = 1;
}
print "당신은 이 페이지를 " . $_SESSION['count'] . '번 보셨습니다.';
