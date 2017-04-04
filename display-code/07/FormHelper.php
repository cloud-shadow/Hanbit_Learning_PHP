class FormHelper {
    protected $values = array();

    public function __construct($values = array()) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->values = $_POST;
        } else {
            $this->values = $values;
        }
    }

    public function input($type, $attributes = array(), $isMultiple = false) {
        $attributes['type'] = $type;
        if (($type == 'radio') || ($type == 'checkbox')) {
            if ($this->isOptionSelected($attributes['name'] ?? null,
                                        $attributes['value'] ?? null)) {
                $attributes['checked'] = true;
            }
        }
        return $this->tag('input', $attributes, $isMultiple);
    }

    public function select($options, $attributes = array()) {
        $multiple = $attributes['multiple'] ?? false;
        return
            $this->start('select', $attributes, $multiple) .
            $this->options($attributes['name'] ?? null, $options) .
            $this->end('select');
    }

    public function textarea($attributes = array()) {
        $name = $attributes['name'] ?? null;
        $value = $this->values[$name] ?? '';
        return $this->start('textarea', $attributes) .
               htmlentities($value) .
               $this->end('textarea');
    }

    public function tag($tag, $attributes = array(), $isMultiple = false) {
        return "<$tag {$this->attributes($attributes, $isMultiple)} />";
    }
    public function start($tag, $attributes = array(), $isMultiple = false) {
    // <select>와 <textarea> 태그는 value 속성이 없다.
        $valueAttribute = (! (($tag == 'select')||($tag == 'textarea')));
        $attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
        return "<$tag $attrs>";
    }
    public function end($tag) {
        return "</$tag>";
    }

    protected function attributes($attributes, $isMultiple,
                                  $valueAttribute = true) {
        $tmp = array();
        // 현재 태그에n ame과 value 속성이 있고
        // $this->values 배열에 name 속성에 해당하는 원소가 있으면
        // value 속성을 설정한다.
        if ($valueAttribute && isset($attributes['name']) &&
            array_key_exists($attributes['name'], $this->values)) {
            $attributes['value'] = $this->values[$attributes['name']];
        }
        foreach ($attributes as $k => $v) {
            // v$가 true면 값을 갖지 않는 속성이므로 속성명만 추가한다.
            if (is_bool($v)) {
                if ($v) { $tmp[] = $this->encode($k); }
            }
            // 그렇지 않으면k =v 형태로 추가한다.
            else {
                $value = $this->encode($v);
                // 다중 값을 선택할 수 있는 폼
                // name에 []를 붙인다.
                if ($isMultiple && ($k == 'name')) {
                    $value .= '[]';
                }
                $tmp[] = "$k=\"$value\"";
            }
        }
        return implode(' ', $tmp);
    }

    protected function options($name, $options) {
        $tmp = array();
        foreach ($options as $k => $v) {
            $s = "<option value=\"{$this->encode($k)}\"";
            if ($this->isOptionSelected($name, $k)) {
                $s .= ' selected';
            }
            $s .= ">{$this->encode($v)}</option>";
            $tmp[] = $s;
        }
        return implode('', $tmp);
    }

    protected function isOptionSelected($name, $value) {
        // $this->values 배열에 $name에 해당하는 항목이 없으면
        // 이 option 은 선택될 수 없다.
        if (! isset($this->values[$name])) {
            return false;
        }
        // $this->values 배열에 $name에 해당하는 항목이 있고
        // 그 값이 배열이면, 배열 원소 중에 v$alue가 있는지 확인한다.
        else if (is_array($this->values[$name])) {
            return in_array($value, $this->values[$name]);
        }
        // 그렇지 않으면, v$alue와 $this->values 배열의 $name 항목을 비교한다.
        else {
            return $value == $this->values[$name];
        }
    }

    public function encode($s) {
        return htmlentities($s);
    }
}