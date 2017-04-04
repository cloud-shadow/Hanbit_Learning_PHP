<?php

// 2번 답안의 html_img2() 함수를 html-img2.php 파일에 저장했다고 간주한다.
include "html-img2.php";

$image_path = '/images/';

print html_img2('puppy.png');
print html_img2('kitten.png','fuzzy');
print html_img2('dragon.png',null,640,480);
