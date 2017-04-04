$main_dishes = array('cuke' => '데친 해삼',
                     'stomach' => '순대',
                     'tripe' => '와인 소스 양대창',
                     'taro' => '돼지고기 토란국',
                     'giblets' => '곱창 소금 구이',
                     'abalone' => '전복 호박 볶음');

print '<select name="main_dish[]" multiple>';

$selected_options = array();
foreach ($defaults['main_dish'] as $option) {
    $selected_options[$option] = true;
}

// <option> 태그 출력
foreach ($main_dishes as $option => $label) {
    print '<option value="' . htmlentities($option) . '"';
    if (array_key_exists($option, $selected_options)) {
        print ' selected';
    }
    print '>' . htmlentities($label) . '</option>';
    print "\n";
}
print '</select>';