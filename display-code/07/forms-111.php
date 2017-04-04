if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $defaults = $_POST;
} else {
    $defaults = array('delivery' => '가능',
                      'size' => '중',
                      'main_dish' => array('토란','양대창'),
                      'sweet' => '케이크');
}
