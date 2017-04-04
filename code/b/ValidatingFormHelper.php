<?php
// RUNNER STUB START
class FormHelper {
// RUNNER STUB END

    // 이 코드는 "class FormHelper" 선언 다음에 들어간다.
    // 다음 배열은 원소를 특정하고 어떤 속성에 어떤 값을 허용할지 결정한다.
    protected $allowedAttributes = ['button' => ['type' => ['submit',
                                                            'reset',
                                                            'button' ] ] ];
// RUNNER STUB START
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

// RUNNER STUB END

    // tag()를 고쳐 $this->attributes()의 첫 번째 인수로 $tag를 전달한다.
    public function tag($tag, $attributes = array(), $isMultiple = false) {
        return "<$tag {$this->attributes($tag, $attributes, $isMultiple)} />";
    }

    // start() 또한 $this->attributes()의 첫 번째 인수로 $tag를 전달하도록 고친다.
    public function start($tag, $attributes = array(), $isMultiple = false) {
        // <select>와 <textarea> 태그는 value 속성이 없다.
        $valueAttribute = (! (($tag == 'select')||($tag == 'textarea')));
        $attrs = $this->attributes($tag, $attributes, $isMultiple,
                                   $valueAttribute);
        return "<$tag $attrs>";
    }
// RUNNER STUB START
    public function end($tag) {
        return "</$tag>";
    }

// RUNNER STUB END

    // attributes()는 $tag를 첫 번째 인수로 전달받고,
    // $this->allowedAttributes에 허용된 속성이면 $attributeCheck를 설정한다.
    // 허용된 속성이 정의되면 제공된 값을 보고,
    // 허용된 값이 아니라면 예외를 발생시킨다.
    protected function attributes($tag, $attributes, $isMultiple,
                                  $valueAttribute = true) {
        $tmp = array();
        // 이 tag에 value 속성이 있고,
        // name에 해당하는 값이 values 배열에 있으면
        // value 속성을 설정한다.
        if ($valueAttribute && isset($attributes['name']) &&
            array_key_exists($attributes['name'], $this->values)) {
            $attributes['value'] = $this->values[$attributes['name']];
        }
        if (isset($this->allowedAttributes[$tag])) {
            $attributeCheck = $this->allowedAttributes[$tag];
        } else {
            $attributeCheck = array();
        }
        foreach ($attributes as $k => $v) {
            // 속성의 값이 사용됐는지 확인한다.
            if (isset($attributeCheck[$k]) &&
                (! in_array($v, $attributeCheck[$k]))) {
                throw new InvalidArgumentException("$v 는 $k 에 허용되지 않는 값입니다");
            }
            // 참 값은 불리언 속성을 의미한다.
            if (is_bool($v)) {
                if ($v) { $tmp[] = $this->encode($k); }
            }
            // 그렇지 않으면k =v 형태로 표현한다.
            else {
                $value = $this->encode($v);
                // 다중 값이 지정된 원소라면,
                //n ame 값 뒤에 []를 붙인다.
                if ($isMultiple && ($k == 'name')) {
                    $value .= '[]';
                }
                $tmp[] = "$k=\"$value\"";
            }
        }
        return implode(' ', $tmp);
    }
// RUNNER STUB START
    protected function options($name, $options) {
        $tmp = array();
        foreach ($options as $k => $v) {
            $s = "<option  value=\"{$this->encode($k)}\"";
            if ($this->isOptionSelected($name, $k)) {
                $s .= ' selected';
            }
            $s .= ">{$this->encode($v)}</option>";
            $tmp[] = $s;
        }
        return implode('', $tmp);
    }

    protected function isOptionSelected($name, $value) {
        // If there's no entry for $name in the values array,
        // then this option can't be selected
        if (! isset($this->values[$name])) {
            return false;
        }
        // If the entry for $name in the values array is itself
        // an array, check if $value is in that array
        else if (is_array($this->values[$name])) {
            return in_array($value, $this->values[$name]);
        }
        // Otherwise, compare $value to the entry to for $name
        // in the values array
        else {
            return $value == $this->values[$name];
        }
    }

    public function encode($s) {
        return htmlentities($s);
    }
}
// RUNNER STUB END