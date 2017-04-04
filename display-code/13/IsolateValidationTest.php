// validate_form()이 정의된 파일
include 'isolate-validation.php';

class IsolateValidationTest extends PHPUnit_Framework_TestCase {

    public function testDecimalAgeNotValid() {
        $submitted = array('age' => '6.7',
                           'price' => '100',
                           'name' => '김영희');
        list($errors, $input) = validate_form($submitted);
        // 나이에 관련된 오류만 확인한다.
        $this->assertContains('나이를 정확하게 입력해주세요.', $errors);
        $this->assertCount(1, $errors);
    }

    public function testDollarSignPriceNotValid() {
        $submitted = array('age' => '6',
                           'price' => '$52',
                           'name' => '김영희');
        list($errors, $input) = validate_form($submitted);
        // 가격에 관련된 오류만 확인한다.
        $this->assertContains('가격을 정확하게 입력해주세요.', $errors);
        $this->assertCount(1, $errors);
    }

    public function testValidDataOK() {
        $submitted = array('age' => '15',
                           'price' => '39.95',
        // 이름 양 끝에 화이트스페이스가 있으면 제거된다.
                           'name' => ' 김영희 ');
        list($errors, $input) = validate_form($submitted);
        // 오류가 없어야 한다.
        $this->assertCount(0, $errors);
        // $input 배열의 세 가지 값을 확인한다.
        $this->assertCount(3, $input);
        $this->assertSame(15, $input['age']);
        $this->assertSame(39.95, $input['price']);
        $this->assertSame('김영희', $input['name']);
    }
}