<?php

class Rectangle {
    public $width;
    public $height;

    public function getSquare() {
        return $this->width * $this->height;
    }

    public function getPerimeter() {
        return 2 * ($this->width + $this->height);
    }
}

$rectangle = new Rectangle();
$rectangle->width = 3;
$rectangle->height = 4;
echo "Площадь: " . $rectangle->getSquare();
echo "Периметр: " . $rectangle->getPerimeter();
