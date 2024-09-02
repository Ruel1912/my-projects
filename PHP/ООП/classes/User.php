<?php

class User {
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function show($text) {
        return $text.'!!!';
    }

    public function setAge($age) {
        if ($this->isAgeCorrect($age)) {
        $this->age = $age;
        }
    }

    public function addAge($years) {
        $newAge = $this->age + $years;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }

    public function subAge($years) {
        $newAge = $this->age - $years;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }

    private function isAgeCorrect($age) {
        return $age > 18 and $age <= 60;
    }
}
