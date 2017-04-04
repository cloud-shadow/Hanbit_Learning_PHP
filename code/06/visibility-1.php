<?php

class Entree {
    private $name;
    protected $ingredients = array();
    /* $name이 private이므로 접근 수단이 필요하다. */
    public function getName() {
        return $this->name;
    }

    public function __construct($name, $ingredients) {
        if (! is_array($ingredients)) {
            throw new Exception('$ingredients가 배열이 아닙니다.');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }

    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
}
