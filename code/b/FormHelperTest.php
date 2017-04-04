<?php

include 'FormHelper.php';

class FormHelperTest extends PHPUnit_Framework_TestCase {

    public $products = [ 'cu&ke' => '데친 <바다> 해삼',
                         'stomach' => '"순대"',
                         'tripe' => '와인 소스 양대창',
                         'taro' => '돼지고기 토란국',
                         'giblets' => '곱창 소금 구이',
                         'abalone' => '전복 호박 볶음'];
    public $stooges = ['Larry','Moe','Curly','Shemp'];

    // 이 코드는 각 테스트 전에 실행한다.
    // 각 테스트 메서드에서 반복하는 것보다
    // setUp() 메서드가 더 정확하다.
    public function setUp() {
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }

    public function testAssociativeOptions() {
        $form = new FormHelper();
        $html = $form->select($this->products);
        $this->assertEquals($html,<<<_HTML_
<select ><option value="cu&amp;ke">데친 &lt;바다&gt; 해삼</option><option value="stomach">"순대"</option><option value="tripe">와인 소스 양대창</option><option value="taro">돼지고기 토란국</option><option value="giblets">곱창 소금 구이</option><option value="abalone">전복 호박 볶음</option></select>
_HTML_
        );
    }

    public function testNumericOptions() {
        $form = new FormHelper();
        $html = $form->select($this->stooges);
        $this->assertEquals($html,<<<_HTML_
<select ><option value="0">Larry</option><option value="1">Moe</option><option value="2">Curly</option><option value="3">Shemp</option></select>
_HTML_
        );
    }

    public function testNoOptions() {
        $form = new FormHelper();
        $html = $form->select([]);
        $this->assertEquals('<select ></select>', $html);
    }

    public function testBooleanTrueAttributes() {
        $form = new FormHelper();
        $html = $form->select([],['np' => true]);
        $this->assertEquals('<select np></select>', $html);

    }

    public function testBooleanFalseAttributes() {
        $form = new FormHelper();
        $html = $form->select([],['np' => false, 'onion' => 'red']);
        $this->assertEquals('<select onion="red"></select>', $html);
    }

    public function testNonBooleanAttributes() {
        $form = new FormHelper();
        $html = $form->select([],['spaceship'=>'<=>']);
        $this->assertEquals('<select spaceship="&lt;=&gt;"></select>', $html);
    }

    public function testMultipleAttribute() {
        $form = new FormHelper();
        $html = $form->select([],["name" => "menu",
                                  "q" => 1, "multiple" => true]);
        $this->assertEquals('<select name="menu[]" q="1" multiple></select>', $html);
    }
}