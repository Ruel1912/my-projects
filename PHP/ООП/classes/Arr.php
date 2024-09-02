<?php

class Arr {

    public $numbers = [1, 2, 3];

    public function __construct($numbers)
    {
        $this->addNumbers($numbers);
    }

    private function addNumbers($numbers) {
        foreach ($numbers as $number) {
            $this->numbers[] = $number;
        }
    }

    public function getAvg() {
        return array_sum($this->numbers) / count($this->numbers);
    }
}
