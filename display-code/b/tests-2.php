public function testNameMustBeSubmitted() {
        $submitted = array('age' => '15',
                           'price' => '39.95');
        list($errors, $input) = validate_form($submitted);
        $this->assertContains('이름을 입력해주세요.', $errors);
        $this->assertCount(1, $errors);

    }