// 수프 종류와 재료
$soup = new Entree('닭고기 수프', array('닭고기', '물'));

// 샌드위치 종류와 재료
$sandwich = new Entree('닭고기 샌드위치', array('닭고기', '빵'));

// 세트 메뉴
$combo = new ComboMeal('수프 + 샌드위치', array($soup, $sandwich));

foreach (['닭고기','물','피클'] as $ing) {
    if ($combo->hasIngredient($ing)) {
        print "세트 메뉴에 들어가는 재료: $ing.\n";
    }
}