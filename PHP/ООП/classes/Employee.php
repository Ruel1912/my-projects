<?php
class Employee {
    private $name;
    private $surname;
    private $age;
    private $salary;

    public function __construct($name, $surname, $age, $salary) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAge() {
        return $this->age;
    }

    public function getSalary() {
        return $this->salary . '$';
    }

    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function checkAge() {
        return $this->age > 18;
    }

    public function doubleSalary() {
        $this->salary *= 2;
    }

    private function isAgeCorrect($age) {
        return $age >= 1 and $age <= 100;
    }
}

