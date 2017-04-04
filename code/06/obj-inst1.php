<?php

// 객체를 생성하고 $soup에 할당
$soup = new Entree;
// $soup 속성 설정
$soup->name = '닭고기 수프';
$soup->ingredients = array('닭고기', '물');

// 또 다른 인스턴스를 생성하고 $sandwich에 할당
$sandwich = new Entree;
// $sandwich 속성 설정
$sandwich->name = '닭고기 샌드위치';
$sandwich->ingredients = array('닭고기', '빵');


foreach (['닭고기','레몬','빵','물'] as $ing) {
    if ($soup->hasIngredient($ing)) {
        print "수프의 재료: $ing.\n";
    }
    if ($sandwich->hasIngredient($ing)) {
        print "샌드위치의 재료: $ing.\n";
    }
}
