<?php

class Student {
    public $name;
    public $course;

    public function transferToNextCourse() {
        if ($this->isCourseCorrect($this->course)) {
            $this->course++;
        }
    }

    private function isCourseCorrect($course) {
        return $course < 5;
    }
}

$student = new Student();
$student->name = 'Mikhail';
$student->course = 5;
$student->transferToNextCourse();
print_r($student);
