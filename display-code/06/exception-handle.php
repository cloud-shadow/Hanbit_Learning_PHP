try {
    $drink = new Entree('우유 한 잔', '우유');
    if ($drink->hasIngredient('우유')) {
        print "맛있어!";
    }
} catch (Exception $e) {
    print "음료를 준비할 수 없습니다: " . $e->getMessage();
}
