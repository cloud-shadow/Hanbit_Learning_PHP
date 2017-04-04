session_start();

// 주문 페이지와 같은 메뉴 목록
$products = [ 'cuke' => '데친 해삼',
              'stomach' => '"순대"',
              'tripe' => '와인 소스 양대창',
              'taro' => '돼지고기 토란국',
              'giblets' => '곱창 소금 구이',
              'abalone' => '전복 호박 볶음'];

// 메인 페이지의 로직에서 검증 부분을 제외한 간소화한 로직
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    process_form();
} else {
    // 폼이 제출되지 않았으면 폼을 표시한다.
    show_form();
}

function show_form() {
    global $products;

    // 제출 버튼 하나만 존재하는 폼이므로
    // FormHelper를 사용하지 않고 여기에서 직접 HTML을 출력한다.
    if (isset($_SESSION['quantities']) && (count($_SESSION['quantities'])>0)) {
        print "<p>주문 내역:</p><ul>";
        foreach ($_SESSION['quantities'] as $field => $amount) {
            list($junk, $code) = explode('_', $field);
            $product = $products[$code];
            print "<li>$amount $product</li>";
        }
        print "</ul>";
        print '<form method="POST" action=' .
              htmlentities($_SERVER['PHP_SELF']) . '>';
        print '<input type="submit" value= "주문 완료" />';
        print '</form>';
    } else {
        print "<p>저장된 주문 내역이 없습니다.</p>";
    }
    // 주문 페이지가 "order.php"에 저장됐다고 간주한다.
    print '<a href="order.php">주문 페이지로 돌아가기</a>';
}

function process_form() {
    // 세션에서 데이터를 지운다.
    unset($_SESSION['quantities']);
    print "<p>주문해주셔서 감사합니다.</p>";
}