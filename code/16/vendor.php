<?php

// 컴포저의 클래스 검색 로직 사용하기.
require 'vendor/autoload.php';

// Swift_Message 클래스를 자동으로 불러오므로 즉시 사용할 수 있다.
$message = Swift_Message::newInstance();
$message->setFrom('julia@example.com');
$message->setTo(array('james@example.com' => 'James Beard'));
$message->setSubject('건강한 간식 레시피');
$message->setBody(<<<_TEXT_
아들,

출출할 때는 이렇게 해보렴. 닭가슴살 1인분과 아스파라거스 몇 개를
믹서기에 넣고 함께 갈아서 경단처럼 뭉친 다음 달궈진 프라이팬에 넣고 볶으면
훌륭한 요리가 된단다. 맛있을거야!

사랑을 담아,
엄마가.

_TEXT_
);
