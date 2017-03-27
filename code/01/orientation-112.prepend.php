<?php
$_POST['meal'] = '점심';

$db = new PDO('sqlite:dinner.db');
$stmt = $db->prepare('SELECT dish,price FROM meals WHERE meal LIKE ?');
if ($stmt === false) {
    $db->exec('CREATE TABLE meals (dish text, price number, meal text)');
    $db->exec("INSERT INTO meals VALUES ('계란',12,'점심')");
}
unset($db);
unset($stmt);
